<?php

class activities_model extends app_base_model{
    function all_area(){
        $sql = "SELECT activities_category.name as cat_name, activities_category.name_cn as cat_name_cn, activities_image.file_name, activities.* FROM activities
        JOIN activities_image ON activities_image.activities_id = activities.id
        JOIN activities_category ON activities_category.id = activities.category_id
        WHERE activities.status = 1
        group by activities.id order by id ASC ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function all_area_by_cat($cat){
        $sql = "SELECT activities_category.name as cat_name, activities_category.name_cn as cat_name_cn, activities_image.file_name, activities.* FROM activities
        JOIN activities_image ON activities_image.activities_id = activities.id
        JOIN activities_category ON activities_category.id = activities.category_id
        where activities_category.name = ? AND  activities.status = 1
        group by activities.id order by id ASC ";
        $result = $this->db->query($sql, array($cat))->result_array();
        return $result;
    }

    function detail_area($title){
        $sql = "SELECT activities_category.name, activities_category.name_cn, activities.* FROM activities
        JOIN activities_category ON activities.category_id = activities_category.id WHERE activities.id=?";
        $result = $this->db->query($sql,array($title))->row_array();
        return $result;
    }

    function gallery($title){
        $sql = "SELECT ci.* FROM activities c
        JOIN activities_image ci ON c.id = ci.activities_id
        WHERE c.id =? ";
        $result = $this->db->query($sql,array($title))->result_array();
        return $result;
    }

    function prev_article($id){
        $sql = "SELECT activities_category.name as cat_name, activities.* FROM activities
        JOIN activities_category ON activities_category.id = activities.category_id
        WHERE activities.id < ? AND  activities.status = 1 ORDER BY activities.id DESC LIMIT 1";
        $result = $this->db->query($sql, array($id))->row_array();
        return $result;
    }

    function next_article($id){
        $sql = "SELECT activities_category.name as cat_name, activities.* FROM activities
        JOIN activities_category ON activities_category.id = activities.category_id
        WHERE activities.id > ? AND  activities.status = 1 ORDER BY activities.id ASC LIMIT 1";
        $result = $this->db->query($sql, array($id))->row_array();
        return $result;
    }

}