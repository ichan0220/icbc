<?php
class explore_model extends app_base_model{

	function available_legend($cat){
		$legend = $this->db->query('SELECT DISTINCT(ex.legend_category),ex.legend_name,ex.position,exc.sub_category,mc.name
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ?', array($cat))->result_array();

		return $legend;
	}

	function available_legend_category($cat){
		$legend_category = $this->db->query('SELECT DISTINCT(ex.legend_category)
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ? AND ex.permanent_legend = ?', array($cat,0))->result_array();
		return $legend_category;
	}

	function empty_legend(){
		$legend = $this->db->query('SELECT DISTINCT(ex.legend_category), mc.id as mc_id,ex.legend_name,ex.position,exc.sub_category,mc.name
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id')->result_array();
		return $legend;
	}

	function empty_legend_category(){
		$legend_category = $this->db->query('SELECT DISTINCT(ex.legend_category)
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE ex.permanent_legend = ?',array(0))->result_array();
		return $legend_category;
	}

	function region_legend_category($sub_cat){
		$legend_category = $this->db->query('SELECT DISTINCT(ex.legend_category)
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			WHERE exc.sub_category = ?', array($sub_cat))->result_array();
		return $legend_category;
	}


	function region_legend($sub_cat,$data){
		$result = $this->db->query('SELECT ex.legend_name
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			WHERE ex.legend_category = ? AND exc.sub_category = ?',array($data,$sub_cat))->result_array();
		return $result;
	}

	function all_items(){
		$data = array();
		$data['hotel'] = $this->db->query('SELECT * FROM explore WHERE legend_category = ?',array('hotel'))->result_array();
		$data['restaurant'] = $this->db->query('SELECT * FROM explore WHERE legend_category = ?',array('restaurant'))->result_array();
		$data['shop'] = $this->db->query('SELECT * FROM explore WHERE legend_category = ?',array('shop'))->result_array();
		$data['golf'] = $this->db->query('SELECT * FROM explore WHERE legend_category = ?',array('golf'))->result_array();
		$data['other'] = $this->db->query('SELECT * FROM explore WHERE legend_category = ?',array('other'))->result_array();
		return $data;
	}

	function items($cat){
		$data = array();
		$data['hotel'] = $this->db->query('SELECT *
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ? AND ex.legend_category = ?',array($cat,'hotel'))->result_array();

		$data['restaurant'] = $this->db->query('SELECT *
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ? AND ex.legend_category = ?',array($cat,'restaurant'))->result_array();

		$data['shop'] = $this->db->query('SELECT *
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ? AND ex.legend_category = ?',array($cat,'shop'))->result_array();

		$data['golf'] = $this->db->query('SELECT *
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ? AND ex.legend_category = ?',array($cat,'golf'))->result_array();

		$data['other'] = $this->db->query('SELECT *
			FROM explore ex
			LEFT JOIN explore_category exc
			ON ex.explorer_category_id = exc.id
			JOIN main_category mc
			ON exc.main_category_id = mc.id
			WHERE mc.name = ? AND ex.legend_category = ?',array($cat,'other'))->result_array();

		return $data;
	}

}