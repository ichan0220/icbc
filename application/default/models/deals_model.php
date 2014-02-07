<?php

class deals_model extends app_base_model{

	function _insert_file($data){
		$this->before_save($data);
		$this->db->where('id',$data['id']);
		$this->db->update('deals',$data);
	}

	function _all_cat(){
        $sql = "SELECT * FROM main_category WHERE parent_id = ? AND status = 1 order by id ASC";
        $result = $this->db->query($sql,array(16))->result_array();
        return $result;
    }

    function _cat(){
        $sql = "SELECT * FROM area_category WHERE status = 1  order by id ASC";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function all_deals(){
        $sql = "SELECT d.*,m.name FROM deals d
        LEFT JOIN main_category m
        ON d.deals_area = m.id
        WHERE d.status = 1 AND d.status=1
        group by id order by id ASC";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function all_deals_by_cat($cat){
        $sql = "SELECT d.*,m.name FROM deals d
        LEFT JOIN area_category m
        ON d.deals_area = m.id
        WHERE m.name = ? AND d.status = 1
        group by id order by id ASC";
        $result = $this->db->query($sql,array($cat))->result_array();
        return $result;
    }

    function all_deals_cat($cat){
        $sql = "SELECT * FROM deals WHERE deals_category LIKE ?";
        $result = $this->db->query($sql,array($cat))->result_array();
        // xlog($result);exit;
        return $result;
    }

    function detail_deals($title){
        $sql = "SELECT * FROM deals WHERE deals_name=?";
        $result = $this->db->query($sql,array($title))->row_array();
        return $result;
    }

}