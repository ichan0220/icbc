<?php

class explore_category extends app_crud_controller{

	function _config_grid() {
        $config = parent::_config_grid();
        $config['names'] = array('Main Category','Sub Category', 'Sub Category (Chinese)','Position');
        $config['formats'] = array('callback__main');
        $config['sorts'] = array();
        $config['fields'] = array('main_category_id','sub_category', 'sub_category_cn','position');
        return $config;
    }

    function _main($value){
    	$main = $this->db->query('SELECT * FROM main_category WHERE id = ?',array($value))->row_array();
    	return $main['name'];
    }

}