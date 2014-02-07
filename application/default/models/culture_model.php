<?php

class culture_model extends app_base_model{

    function all_culture(){
        $sql = "SELECT culture_category.name as cat_name, culture_image.file_name, culture.* FROM culture
        JOIN culture_image ON culture_image.culture_id = culture.id
        JOIN culture_category ON culture_category.id = culture.category_id
        WHERE culture.status = 1
        group by culture.id order by id ASC ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function all_culture_by_cat($cat){
        $sql = "SELECT culture_category.name as cat_name, culture_image.file_name, culture.* FROM culture
        JOIN culture_image ON culture_image.culture_id = culture.id
        JOIN culture_category ON culture_category.id = culture.category_id
        where culture_category.name = ? AND culture.status = 1
        group by culture.id order by id ASC ";
        $result = $this->db->query($sql, array($cat))->result_array();
        return $result;
    }

    function detail_culture($title){
        $sql = "SELECT * FROM culture WHERE id=?";
        $result = $this->db->query($sql,array($title))->row_array();
        return $result;
    }

    function gallery($title){
        $sql = "SELECT ci.* FROM culture c
        JOIN culture_image ci ON c.id = ci.culture_id
        WHERE c.id =? AND c.status = 1";
        $result = $this->db->query($sql,array($title))->result_array();
        return $result;
    }

    function prev_article($id){
        $sql = "SELECT culture_category.name as cat_name, culture.* FROM culture
        JOIN culture_category ON culture_category.id = culture.category_id
        WHERE culture.id < ? AND culture.status = 1 ORDER BY culture.id DESC LIMIT 1";
        $result = $this->db->query($sql, array($id))->row_array();
        return $result;
    }

    function next_article($id){
        $sql = "SELECT culture_category.name as cat_name, culture.* FROM culture
        JOIN culture_category ON culture_category.id = culture.category_id
        WHERE culture.id > ? AND culture.status = 1 ORDER BY culture.id ASC LIMIT 1";
        $result = $this->db->query($sql, array($id))->row_array();
        return $result;
    }

}