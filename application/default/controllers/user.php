<?php

/**
 * user.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2012/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (yyyy/mm/dd hh:mm:ss) (author)
 * 2012/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */
class user extends base_user_controller {

    function __construct() {
        parent::__construct();

        $this->_validation = array(
            'add_user' => array(
                'first_name' => array('trim|required'),
                'last_name' => array('trim|required'),
                'email' => array('trim|required|valid_email|callback__unique_email'),
                'username' => array('trim|required|callback__unique_username'),
                'password' => array('trim|required'),
                'password2' => array('trim|required|callback__retypepassword_check', l('Retype Password')),
            ),
            'edit_user' => array(
                'first_name' => array('trim|required'),
                'last_name' => array('trim|required'),
                'email' => array('trim|required|valid_email|callback__unique_email'),
                'username' => array('trim|required|callback__unique_username'),
                'password' => array('trim|required'),
                'password2' => array('trim|required|callback__retypepassword_check', l('Retype Password')),
            ),
        );
    }

    function login($mode = '') {
        $this->_layout_view = 'layouts/main';
        if ($_POST || !empty($mode)) {

            $is_login = $this->auth->login(($_POST) ? $_POST['login'] : '', ($_POST) ? $_POST['password'] : '', $mode);

            if ($is_login) {
                $this->_model('user')->add_trail('login');
                redirect('site/index');
            } else {
                add_error(l('Username/email or password not found'));
            }
        } else {
            $this->_model('user')->add_trail('logout');
            $this->auth->logout();
        }
    }

    function add_user($id = null) {
        $this->_view = $this->_name . '/add_user';

        $user_model = $this->_model('user');
        $user = $this->auth->get_user();

        if ($_POST) {
            if ($id && !$_POST['password'] && !$_POST['password2']) {
                unset($this->_validation['edit']['password']);
                unset($this->_validation['edit']['password2']);
            }

            if ($this->_validate()) {
                $_POST['roles'] = 3;
                try {
                    $id = $user_model->save($_POST, $id);

                    add_info(($id) ? l('Record updated') : l('Record added') );

                    if (!$this->input->is_ajax_request()) {
                        redirect($this->_get_uri('list_user'));
                    }
                } catch (Exception $e) {
                    add_error(l($e->getMessage()));
                }
            }
        }
    }
    
    function _save($id = null) {
        $this->_view = $this->_name . '/show';

        $user_model = $this->_model('user');
        $user = $this->auth->get_user();
        $ur = $user['roles'][0]['id'];
        if ($_POST) {
            if ($id && !$_POST['password']  && !$_POST['password2']) {
                unset($this->_validation['edit']['password']);
                unset($this->_validation['edit']['password2']);
            }

            if ($this->_validate()) {
                try {
                    $id = $user_model->save($_POST, $id);

                    add_info( ($id) ? l('Record updated') : l('Record added') );

                    if (!$this->input->is_ajax_request()) {
                        redirect($this->_get_uri('list_user'));
                    }
                } catch (Exception $e) {
                    add_error(l($e->getMessage()));
                }

            }
        } else {
            if ($id !== null) {
                $this->_data['id'] = $id;
                $_POST = $user_model->get($id);
                $param = array($_POST['id']);

                $roles = $user_model->_db()->query('SELECT role_id FROM ' . $user_model->_db()->dbprefix . 'user_role WHERE user_id = ?', $param)->result_array();
                $_POST['roles'] = array();
                if (!empty($roles)) {
                    foreach ($roles as $role) {
                        $_POST['roles'][] = $role['role_id'];
                    }
                }
                $org = $user_model->_db()->query('SELECT org_id FROM ' . $user_model->_db()->dbprefix . 'user_organization WHERE user_id = ?', $param)->row_array();
                if (!empty($org)) {
                    $_POST['org_id'] = $org['org_id'];
                }

                $this->hooks->call_hook('user:fetch', $_POST);
            }
        }

        $_POST['password'] = '';

        if (!$user['is_top_member']) {
            $this->db->where('id !=', '1');
        }
        $roles =  $this->db->order_by('name')->get('role')->result_array();
        $this->_data['role_items'] = array('' => l('(Please select)'));
        foreach ($roles as $role) {
            $this->_data['role_items'][$role['id']] = $role['name'];
        }
        $orgs = $this->_model('organization')->find(null, array('name' => 'asc'));
        $this->_data['org_items'] = array('' => l('(Please select)'));
        foreach ($orgs as $org) {
            $this->_data['org_items'][$org['id']] = $org['name'];
        }
        $this->_data['user'] = $user;
        $this->_data['ur'] = $ur;
    }
    
    function list_user($offset = 0) {
        $this->load->library('pagination');

        $config_grid = $this->_config_grid();
        $config_grid['sort'] = $this->_get_sort();

        $filter = $this->_get_filter();

        $count = 0;
        $this->_data['data'] = array();
        $this->_data['data']['items'] = $this->_model()->list_user($filter, $config_grid['sort'], $this->pagination->per_page, $offset, $count);
        $this->_data['filter'] = $filter;
        $this->load->library('xgrid', $config_grid, 'listing_grid');

        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'total_rows' => $count,
            'per_page' => $this->pagination->per_page,
            'uri_segment' => 3,
            'base_url' => site_url('user/list_user/'),
        ));
    }

}