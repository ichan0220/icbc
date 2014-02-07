<?php
/**
 * Description of main_category *
 * @author generator
 */

class main_category extends app_crud_controller {

    function _save($id=null){
        $this->_view = $this->_name . '/show';

        $parents = $this->db->query("SELECT * FROM main_category WHERE parent_id=?", array('0'))->result_array();
        $parent_options = array(
            'Please Select'
        );

        foreach ($parents AS $parent) {
            $parent_options[$parent['id']] = $parent['name'];
        }
        $this->_data['cat_options'] = $parent_options;

        if ($_POST) {
            if ($this->_validate()) {
                $_POST['id'] = $id;
                try {
                    $new_id = $this->_model()->save($_POST, $id);
                    add_info( ($id) ? l('Record updated') : l('Record added') );

                    redirect(site_url('main_category/listing'));
                } catch (Exception $e) {
                    add_error(l($e->getMessage()));
                }
            }
        } else {
            if ($id !== null) {
                $this->_data['id'] = $id;
                $_POST = $this->_model()->get($id);
                if (empty($_POST)) {
                    show_404($this->uri->uri_string);
                }
            }
            $this->load->library('user_agent');
            $this->session->set_userdata('referrer', $this->agent->referrer());
        }
        $this->_data['fields'] = $this->_model()->list_fields(true);
    }


}
