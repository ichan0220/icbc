<?php

class area_category_model extends app_base_model{

    function _all_cat(){
        $sql = "SELECT * FROM area_category order by id ASC";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function _insert_file($id,$data){
		$this->before_save($data);
		$this->db->where('id',$id);
		$this->db->update('area_category',$data);
	}

}