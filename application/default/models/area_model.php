<?php

class area_model extends app_base_model{
    function all_area(){
        $sql = "SELECT area_category.name as cat_name, area_image.file_name, area.* FROM area
        JOIN area_image ON area_image.area_id = area.id
        JOIN area_category ON area_category.id = area.category_id
        WHERE area.status = 1
        group by area.id order by id ASC ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function all_area_by_cat($cat){
        $sql = "SELECT area_category.name as cat_name, area_image.file_name, area.* FROM area
        JOIN area_image ON area_image.area_id = area.id
        JOIN area_category ON area_category.id = area.category_id
        where area_category.name = ? AND area.status = 1
        group by area.id order by id ASC ";
        $result = $this->db->query($sql, array($cat))->result_array();
        return $result;
    }

    function detail_area($title){
        $sql = "SELECT area_category.name as cat_name, area_category.name_cn as cat_name_cn, area.* FROM area
        JOIN area_category ON area.category_id = area_category.id WHERE area.id=?";
        $result = $this->db->query($sql,array($title))->row_array();
        return $result;
    }

    function gallery($title){
        $sql = "SELECT ci.* FROM area c
        JOIN area_image ci ON c.id = ci.area_id
        WHERE c.id =? AND c.status = 1";
        $result = $this->db->query($sql,array($title))->result_array();
        return $result;
    }

    function prev_article($id){
        $sql = "SELECT area_category.name as cat_name, area.* FROM area
        JOIN area_category ON area_category.id = area.category_id
        WHERE area.id < ? AND area.status = 1 ORDER BY area.id DESC LIMIT 1";
        $result = $this->db->query($sql, array($id))->row_array();
        return $result;
    }

    function next_article($id){
        $sql = "SELECT area_category.name as cat_name, area.* FROM area
        JOIN area_category ON area_category.id = area.category_id
        WHERE area.id > ? AND area.status = 1 ORDER BY area.id ASC LIMIT 1";
        $result = $this->db->query($sql, array($id))->row_array();
        return $result;
    }

}