<?php

class deals extends app_crud_controller{

    function __construct() {
       parent::__construct();
       $this->_data['page_class'] = "info";
       $this->_data['contact'] = $this->_model('contact')->_all_contact();
       $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
       $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
   }

	function _save($id = null) {
        $this->_view = $this->_name . '/show';

        $areas = $this->db->query('SELECT * FROM area_category ORDER BY name ASC')->result_array();
        $this->_data['area_options'] = array('' => '(please select)');
        foreach ($areas as $area) {
            $this->_data['area_options'][$area['id']] = $area['name'];
        }

        $this->_data['deals_categorys'] = array(
            '' => '(please select)',
            'hotels' => 'HOTELS/VILLAS',
            'restaurant' => 'RESTAURANT/CAFES',
            'shops' => 'SHOPS',
            'golf' => 'GOLF CLUBS',
            'others' => 'OTHERS',
            );

        if ($_POST) {
            if(!empty($_FILES)){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['data_dir'] = $this->_name.'/image';
                $config['upload_path'] = $this->_name.'/image';
                $config['encrypt_name'] = true;
                $config['field'] = 'deals_image';
                $this->load->library('ximage',$config);
                $this->ximage->initialize($config);
            }
            if ($this->_validate()) {
                $_POST['id'] = $id;
                try {
                    $id = $this->_model()->save($_POST, $id);

                    if($_FILES['deals_image']['name']){
                        $file = $this->ximage->_data;
                        $this->_insert_file($id,$file);
                    }

                    $this->session->unset_userdata('referrer');
                    $referrer = $this->session->userdata('referrer');
                    if (empty($referrer)) {
                        $referrer = $this->_get_uri('listing');
                    }

                    add_info( ($id) ? l('Record updated') : l('Record added') );

                    if (!$this->input->is_ajax_request()) {
                        redirect($referrer);
                    }
                } catch (Exception $e) {
                    add_error(l($e->getMessage()));
                }
            }
        } else {
            if ($id !== null) {
                $this->_data['id'] = $id;
                $this->_data['images'] = $this->db->query('SELECT * FROM deals WHERE id = ? AND (deals_icon IS NOT NULL OR deals_thumb IS NOT NULL)',array($id))->row_array();

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

    function cat($cat){
        $this->_view = 'web/deals';
        $this->_layout_view = 'layouts/web';
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
        // xlog($this->_data['lang']);exit;

        $cat = urldecode($cat);
        $this->_data['cat'] = $cat;
        $this->_data['label'] = '<span class="deals_icbc" style="font-weight:200;font-size:78px">ICBC</span><span class="deals_icbc" style="font-weight: bold; font-size:60px"> '.l('red').'</span>  <span class="deals_icbc" style="font-size:60px">*'.l('deals').'</span>';
        $this->_data['deals_cat'] = $this->_model('deals')->_cat();
        if(!empty($cat)){
            $this->_data['deals'] = $this->_model('deals')->all_deals_cat($cat);
        }else{
            $this->_data['deals'] = $this->_model('deals')->all_deals();
        }
        $this->_data['color'] = 'color: #333;';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['border'] = 'border-right: 1px solid #333';
    }

    function _insert_file($id,$files){
        $deals = $this->db->query('SELECT * FROM deals WHERE id = ?',array($id))->row_array();

        if($this->uri->segment(2) == 'edit' && empty($deals['deals_icon']) && !empty($deals['deals_thumb'])){
            $data = array(
                'id' => $id,
                'deals_icon' => $files[0]['file_name']
            );
        } elseif($this->uri->segment(2) == 'edit' && !empty($deals['deals_icon']) && empty($deals['deals_thumb'])){
            $data = array(
                'id' => $id,
                'deals_thumb' => $files[0]['file_name']
            );
        } else {
            $data = array(
                'id' => $id,
                'deals_icon' => $files[0]['file_name'],
                'deals_thumb' => $files[0]['file_name']
            );
        }

        $this->_model()->_insert_file($data);
    }

    function delete_deals_icon($id){
        $image = $this->db->query('SELECT * FROM deals WHERE id = ?',array($id))->row_array();

        unlink('data/deals/image/original/' . $image['deals_icon']);
        unlink('data/deals/image/thumb/' . $image['deals_icon']);

        $sql = 'UPDATE deals SET deals_icon = \'\' WHERE id = ?';
        $this->db->query($sql, array($id));
        redirect(site_url('deals/edit' .'/'. $id ));
    }

    function delete_deals_thumb($id){
        $image = $this->db->query('SELECT * FROM deals WHERE id = ?',array($id))->row_array();

        unlink('data/deals/image/original/' . $image['deals_thumb']);
        unlink('data/deals/image/thumb/' . $image['deals_thumb']);

        $sql = 'UPDATE deals SET deals_thumb = \'\' WHERE id = ?';
        $this->db->query($sql, array($id));
        redirect(site_url('deals/edit' .'/'. $id ));
    }

    function deal_detail(){
        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<h2 class="culture-title"><a href="#">deals</a> <a href="#"><p>/South Bali</p></a></h2>';
        $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
        $this->_data['color'] = 'color: #333; ';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';

    }

    function view(){
        $cat = $this->uri->segment(3);
        $cat = urldecode($cat);
        $title = $this->uri->segment(4);
        $this->_data['title'] = $title = urldecode($title);

        $this->_layout_view = 'layouts/web';
        $this->_data['color'] = 'color: #333; ';
        $this->_data['border'] = 'border-right: 1px solid #333';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['label'] = '<h2 class="culture-title"><a href="'.site_url('web/deals').'">deals</a> <a href="'.site_url('web/deals').'/'.$cat.'"><span>/'.$cat.'</span></a></h2>';
        $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
        $this->_data['deals'] = $deals = $this->_model('deals')->detail_deals($title);

        $deals_category = $deals['deals_category'];
        $deals_category = explode(',', $deals_category);
        foreach ($deals_category as $key => &$value) {
            $value = trim($value);
        }
        $this->_data['deals_category'] = $deals_category;

    }

    function _check_access() {
        $allowed = array(
            'cat',
        );

        if (in_array($this->uri->rsegments[2], $allowed)) {

            return true;
        }

        return parent::_check_access();
    }

}