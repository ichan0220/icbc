
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class web extends App_Base_Controller {

    function _check_access() {
//        return $this->auth->is_login();
        return TRUE;
    }

    function set_lang($lang) {
        $this->lang->set_language($lang);
        redirect($_SERVER['HTTP_REFERER']);
    }

   function __construct() {
       parent::__construct();
       $this->_data['page_class'] = "info";
       $this->_data['contact'] = $this->_model('contact')->_all_contact();
       $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
       $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
   }

    function index() {

        $this->_page_title = l('ICBC - Tour Guide Bali Website');
        $this->_page_description = l('ICBC - Tour Guide Bali Website');
//        $this->_page_keyword =
//        $key = $this->_keyword();
//        foreach($key as $i) {
//            $this->_page_keyword = $this->_page_keyword .  l($i['name']. ',');
//        }
        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<img id="img-content" src="' . base_url() . 'themes/icbc/img/container-conten.png" class="logo" alt="The Best of BALI" data-small-img-src="' . base_url() . 'themes/icbc/img/container-conten-small.png" />';
        $this->load->helper('format');
        $this->load->helper('security');

        $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();

    }

    function culture($cat=null, $title=null){
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
        // xlog($this->_data['lang']);exit;

        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<h2 class="culture-title">'.l('culture').'</h2>';
        $this->_data['culture_cat'] = $this->_model('culture_category')->_all_cat();
        $cat = rawurldecode($cat);
        // xlog($cat);exit;
        if(!empty($cat)){
            $this->_data['culture'] = $this->_model('culture')->all_culture_by_cat($cat);
        }else{
            $this->_data['culture'] = $this->_model('culture')->all_culture();
        }
        $this->_data['color'] = 'color: #333; ';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['border'] = 'border-right: 1px solid #333';
    }

    function areas($cat=null, $title=null){
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
        // xlog($this->_data['lang']);exit;

        $cat = urldecode($cat);
        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<h2 class="culture-title">'.l('areas').'</h2>';
        $this->_data['area_cat'] = $this->_model('area_category')->_all_cat();
        if(!empty($cat)){
            $this->_data['area'] = $this->_model('area')->all_area_by_cat($cat);
        }else{
            $this->_data['area'] = $this->_model('area')->all_area();
        }
        $this->_data['color'] = 'color: #333; ';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['border'] = 'border-right: 1px solid #333';
    }

    function activities($cat=null, $title=null){
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
        // xlog($this->_data['lang']);exit;

        $cat = rawurldecode($cat);
        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<h2 class="culture-title">'.l('activities').'</h2>';
        $this->_data['area_cat'] = $this->_model('activities_category')->_all_cat();
        if(!empty($cat)){
            $this->_data['area'] = $this->_model('activities')->all_area_by_cat($cat);
        }else{
            $this->_data['area'] = $this->_model('activities')->all_area();
        }
        $this->_data['color'] = 'color: #333; ';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['border'] = 'border-right: 1px solid #333';
    }

    function explore($cat=null){
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
        // xlog($this->_data['lang']);exit;

        $cat = urldecode($cat);

        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<h2 class="culture-title">'.l('maps').'</h2>';
        $this->_data['south_bali'] = $this->db->query('SELECT * FROM explore_category WHERE main_category_id = ? ORDER BY id ASC',array('18'))->result_array();
        $this->_data['southwest_coast'] = $this->db->query('SELECT * FROM explore_category WHERE main_category_id = ? ORDER BY id ASC',array('19'))->result_array();
        $this->_data['east_cost'] = $this->db->query('SELECT * FROM explore_category WHERE main_category_id = ? ORDER BY id ASC',array('20'))->result_array();
        $this->_data['central_bali'] = $this->db->query('SELECT * FROM explore_category WHERE main_category_id = ? ORDER BY id ASC',array('21'))->result_array();
        $this->_data['north_bali'] = $this->db->query('SELECT * FROM explore_category WHERE main_category_id = ? ORDER BY id ASC',array('22'))->result_array();
        $this->_data['the_islands'] = $this->db->query('SELECT * FROM explore_category WHERE main_category_id = ? ORDER BY id ASC',array('23'))->result_array();
        $this->_data['color'] = 'color: #333; ';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['border'] = 'border-right: 1px solid #333';
    }

    function deals($cat=null, $title=null){
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
        // xlog($this->_data['lang']);exit;

        $cat = urldecode($cat);
        $this->_data['cat'] = $cat;
        $this->_layout_view = 'layouts/web';
        $this->_data['label'] = '<span class="deals_icbc deals_icbc_large" style="font-weight:200;font-size:78px">ICBC</span><span class="deals_icbc" style="font-weight: bold; font-size:60px"> '.l('red').'</span>  <span class="deals_icbc" style="font-size:60px">*'.l('deals').'</span>';
        $this->_data['deals_cat'] = $this->_model('deals')->_cat();
        if(!empty($cat)){
            $this->_data['deals'] = $this->_model('deals')->all_deals_by_cat($cat);
        }else{
            $this->_data['deals'] = $this->_model('deals')->all_deals();
        }
        $this->_data['color'] = 'color: #333;';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['border'] = 'border-right: 1px solid #333';
    }

}
