<?php

class culture_category extends app_crud_controller{

	function _config_grid() {
        $config = parent::_config_grid();
        $config['names'] = array('Name','Name Chinese','Description');
        $config['formats'] = array('row_detail');
        $config['sorts'] = array();
        $config['fields'] = array('name','name_cn','description');
        return $config;
    }

	function _insert_file($id,$files,$uri){
		foreach ($files as $key => $value) {
			$data = array(
				'orig_name' => $value['orig_name'],
				'file_name' => $value['file_name'],
				'uri' => $uri.$value['file_name']
				);
			$this->_model()->_insert_file($id,$data);
		}
	}

	function delete_image ($id, $id_image){
        $image = "SELECT * FROM culture_category WHERE id = ?";
        $res = $this->db->query($image, array($id_image))->row_array();

        unlink('data/'.$this->_name.'/image/original/' . $res['file_name']);
        unlink('data/'.$this->_name.'/image/thumb/' . $res['file_name']);

        $sql = "UPDATE culture_category SET file_name = '',orig_name = null,uri = null WHERE id = ?";
        $this->db->query($sql, array($id_image));
        redirect(site_url($this->_name.'/edit' .'/'. $id ));
    }
}