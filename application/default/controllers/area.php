<?php

class area extends app_crud_controller{

    function __construct() {
       parent::__construct();
       $this->_data['page_class'] = "info";
       $this->_data['contact'] = $this->_model('contact')->_all_contact();
       $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
       $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;
   }

	function _config_grid() {
        $config = parent::_config_grid();
        $config['names'] = array('Title','Title Chinese','Description');
        $config['formats'] = array('row_detail', '','callback__split');
        $config['sorts'] = array();
        $config['fields'] = array('title','title_cn','description');
        return $config;
    }

    function _split($value){
        $str = explode(" ", $value);
        $word = '';
        for($i=0; $i<10;$i++){
            $word = $word .' '. $str[$i] ;
        }
        $word_ = $word . ' .....';
        return $word_;
    }


    function view(){

        $title = $this->uri->segment(4);
        // $title = urldecode($title);
        $this->_layout_view = 'layouts/web';
        $this->_data['color'] = 'color: #333;';
        $this->_data['border'] = 'border-right: 1px solid #333';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
        $this->_data['area_details'] = $fa = $this->_model('area')->detail_area($title);

        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;

        if($l == 'en_us'){
            $cat = $fa['cat_name'];
        }else{
            $cat = $fa['cat_name_cn'];
        }
        $this->_data['label'] = '<h2 class="culture-title"><a href="'.site_url('web/areas').'">'.l('areas').'</a> <a href="'.site_url('web/areas').'/'.$cat.'"><span>/'.$cat.'</span></a></h2>';
        // xlog($this->_data['area_details']);exit;
        $this->_data['gallery'] = $this->_model()->gallery($title);
        $this->_data['prev_article'] = $this->_model()->prev_article($fa['id']);
        $this->_data['next_article'] = $this->_model()->next_article($fa['id']);
        // xlog($this->_data['prev_article']);exit;

    }

    function _check_access() {
        $allowed = array(
            'view',
        );

        if (in_array($this->uri->rsegments[2], $allowed)) {

            return true;
        }

        return parent::_check_access();
    }

}