<?php

class explore extends app_crud_controller{

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
        $config['names'] = array('Explorer Category','Legend Category','Legend Name','Position');
        $config['formats'] = array('callback__explorer');
        $config['sorts'] = array();
        $config['fields'] = array('explorer_category_id','legend_category','legend_name','position');
        return $config;
    }

    function _explorer($value){
    	$main = $this->db->query('SELECT * FROM explore_category WHERE id = ?',array($value))->row_array();
    	return $main['sub_category'];
    }

    function bali($cat=null){

        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;

        $cat = urldecode($cat);
        $title = $this->uri->segment(2);
        $this->_layout_view = 'layouts/web';
        $this->_data['color'] = 'color: #333; ';
        $this->_data['border'] = 'border-right: 1px solid #333';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();

        if(!empty($cat)){
            $this->_data['label'] = '<h2 class="culture-title"><a href="'.site_url('web/explore').'">'.l('maps').'</a> <a href="'.site_url('web/explore').'/'.$cat.'"><span>/'.l($cat).'</span></a></h2>';
            $this->_data['legend'] = $legend = $this->_model()->available_legend($cat);
            $this->_data['legend_category'] = $category = $this->_model()->available_legend_category($cat);
            $this->_data['items'] = $this->_model()->items($cat);
        } else {
            $this->_data['label'] = '<h2 class="culture-title"><a href="'.site_url('web/explore').'">'.l('maps').'</a> <a href="'.site_url('web/explore').'/'.$cat.'"><span>/'.l($title).'</span></a></h2>';
            $this->_data['legend'] = $legend = $this->_model()->empty_legend();
            $this->_data['legend_category'] = $this->_model()->empty_legend_category();
            $this->_data['items'] = $this->_model()->all_items();

        }

        //maps
        $this->load->library('googlemaps');
        if($cat == 'south bali'){
            $config['center'] = '-8.798225,115.170364';
            $config['zoom'] = '12';
            $this->_south_bali();
        } elseif($cat == 'south west coast'){
            $config['center'] = '-8.491388,115.036469';
            $config['zoom'] = '10';
            $this->_south_west_coast();
        } elseif($cat == 'east coast'){
            $config['center'] = '-8.435696,115.477295';
            $config['zoom'] = '10';
            $this->_east_coast();
        } elseif($cat == 'central bali'){
            $config['center'] = '-8.374562,115.21225';
            $config['zoom'] = '10';
            $this->_central_bali();
        } elseif($cat == 'north & northwest bali'){
            $config['center'] = '-8.222364,114.87854';
            $config['zoom'] = '10';
            $this->_north_bali();
        } elseif($cat == 'the islands') {
            $config['center'] = '-8.738507,115.548706';
            $config['zoom'] = '11';
            $this->_the_islands();
        } else {
            $config['center'] = '-8.358258,115.072174';
            $config['zoom'] = '9';
        }

        $config['map_type'] = 'ROADMAP';
        $config['zoomControlStyle'] = 'SMALL';
        $config['disableStreetViewControl'] = 'TRUE';
        $config['disableMapTypeControl'] = 'TRUE';
        $config['disableNavigationControl'] = 'TRUE';
        $config['styles'] = array(
          array("name"=>"Bali", "definition"=>array(
            array("featureType"=>"water", "stylers"=>array(array("color"=>"#f9f9f9"))),
            array("featureType"=>"landscape", "elementType"=>"geometry.fill", "stylers"=>array(array("color"=>"#e2e3e3"))),
            array("featureType"=>"road", "stylers"=>array(array("color"=>"#c5c5c7"))),
          ))
        );
        $config['stylesAsMapTypes'] = 'TRUE';
        $config['stylesAsMapTypesDefault'] = "Bali";
        $this->googlemaps->initialize($config);
        $marker = array();
        foreach ($legend as $key => $value) {
            $marker['zIndex'] = $key;
            $marker['position'] = $value['position'];
            $content =  '<div><p style="margin: 0; color: red; font-size: 20px;font-family: Abel; font-weight: bold; text-transform: uppercase">'.$value['legend_name'].'</p><p style="color: red; font-size: 13px;font-family: Abel; text-transform: uppercase; margin: 0">'.$value['sub_category'].'</p></div>';
            $marker['infowindow_content'] = $content;
            $marker['animation'] = 'DROP';
            $marker['icon'] = base_url() . 'themes/icbc/img/icons/maps/' . strtolower($value['legend_category']) . '.png';
            $this->googlemaps->add_marker($marker);
        }

        $result = $this->googlemaps->create_map();
        $this->_data['map'] = $result;
        //maps
    }

    function _south_bali(){
        //South Bali
        $this->_data['border'] = 'border-right: 1px solid #333';
        $data = $this->db->query('SELECT * FROM south_bali')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }

        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);
    }

    function _south_west_coast(){
        //southwest coast
        $this->_data['border'] = 'border-right: 1px solid #333';
        $data = $this->db->query('SELECT * FROM southwest_coast')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }

        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);
    }

    function _east_coast(){
        // east coast
        $this->_data['border'] = 'border-right: 1px solid #333';
        $data = $this->db->query('SELECT * FROM east_coast')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }

        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);
    }

    function _central_bali(){
        //central Bali
        $data = $this->db->query('SELECT * FROM central_bali')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }

        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);
    }

    function _north_bali(){
        //north Bali
        $data = $this->db->query('SELECT * FROM north_bali')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }

        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);
    }

    function _the_islands(){
        //The Island
        $data = $this->db->query('SELECT * FROM the_islands')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }
        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);

        //The Island_1
        $data = $this->db->query('SELECT * FROM the_islands_1')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }
        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);

        //The Island_2
        $data = $this->db->query('SELECT * FROM the_islands_2')->result_array();
        $polygon = array();
        $polygon['points'] = array();
        foreach ($data as $key => $value) {
            $position = $value['lat'].','.$value['lang'];
            $polygon['points'][$key] = $position;
        }
        $polygon['strokeColor'] = '#FFFFFF';
        $polygon['fillColor'] = '#FF99CC';
        $this->googlemaps->add_polygon($polygon);
    }

    function detail_bali($cat=null,$sub_cat=null){
        $l = $this->lang->fetch_language();
        $this->_data['lang'] = $l;

        $cat = urldecode($cat);
        $sub_cat = urldecode($sub_cat);

        $this->_layout_view = 'layouts/web';
        $this->_data['color'] = 'color: #333; ';
        $this->_data['border'] = 'border-right: 1px solid #333';
        $this->_data['devider'] = 'background: url('.base_url().'themes/icbc/img/devider-black.png) right top no-repeat;';
        $this->_data['main_cat'] = $this->_model('main_category')->_all_smenu();
        $this->_data['label'] = '<h2 class="culture-title"><a href="'.site_url('web/explore').'">'.l('maps').'</a> <a href="'.site_url('web/explore').'/'.$cat.'"><span>/'.l($cat).'</span></a></h2>';
        $this->_data['title'] = $sub_cat;

        $explore_category = $this->db->query('SELECT * FROM explore_category WHERE sub_category = ?',array($sub_cat))->result_array();
        $this->load->library('googlemaps');
        foreach ($explore_category as $key => $value) {
            $config['center'] = $value['position'];
            $legend = $this->db->query('SELECT * FROM explore WHERE explorer_category_id = ?',array($value['id']))->result_array();
        }

        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['zoomControlStyle'] = 'SMALL';
        $config['disableStreetViewControl'] = 'TRUE';
        $config['disableMapTypeControl'] = 'TRUE';
        $config['disableScaleControl'] = 'TRUE';
        $config['disableNavigationControl'] = 'TRUE';

        $config['styles'] = array(
          array("name"=>"Bali", "definition"=>array(
            array("featureType"=>"water", "stylers"=>array(array("color"=>"#f9f9f9"))),
            array("featureType"=>"landscape", "elementType"=>"geometry.fill", "stylers"=>array(array("color"=>"#e2e3e3"))),
            array("featureType"=>"road", "stylers"=>array(array("color"=>"#c5c5c7"))),
          ))
        );
        $config['stylesAsMapTypes'] = 'TRUE';
        $config['stylesAsMapTypesDefault'] = "Bali";

        $this->googlemaps->initialize($config);

        foreach ($legend as $key => $value) {
            $marker['zIndex'] = $key;
            $marker['position'] = $value['position'];
            $content =  '<div><p style="margin: 0; color: red; font-size: 13px;font-family: Abel; text-transform: uppercase">'.$value['legend_name'].'</p><p style="color: red; font-size: 13px;font-family: Abel; text-transform: uppercase; margin: 0"></p><img src="'.base_url().'timthumb.php?src='.base_url().'themes/icbc/img/explore-small1.jpg&w=210&h=100" alt="image" /></div>';
            $marker['infowindow_content'] = $content;
            $marker['animation'] = 'DROP';
            $marker['icon'] = base_url() . 'themes/icbc/img/icons/maps/' . strtolower($value['legend_category']) . '.png';
            $this->googlemaps->add_marker($marker);
        }


        $this->_data['map'] = $this->googlemaps->create_map();

        $this->_data['legend_category'] = $legend_category = $this->_model()->region_legend_category($sub_cat);
        foreach ($legend_category as $key => $value) {
            $data[strtolower($value['legend_category'])] = $this->_model()->region_legend($sub_cat,$value['legend_category']);
        }
        // $this->_data['hotels'] = $data['hotel'];
        // $this->_data['restaurants'] = $data['restaurant'];
        // $this->_data['shops'] = $data['shop'];
        // $this->_data['golfs'] = $data['golf'];
        // $this->_data['others'] = $data['other'];
    }


    function _check_access() {
        $allowed = array(
            'bali',
            'detail_bali',
            );
        if (in_array($this->uri->rsegments[2], $allowed)) {
            return true;
        }
        return parent::_check_access();
    }
}