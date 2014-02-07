<?php
/**
 * Description of main_category_model
 *
 * @author generator
 */

class main_category_model extends app_base_model {
    function show_category(){
        $sql = "SELECT * FROM main_category ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function show_cat_child($cat_id){
        $sql = "SELECT * FROM main_category WHERE id=?";
        $result = $this->db->query($sql, array($cat_id))->result_array();
        return $result;
    }

    function _all_smenu(){
        $sql = "SELECT * FROM main_category order by parent_id ASC, id ASC";

        foreach ($this->db->query($sql)->result_array() as $r) {
            $cats[$r['parent_id']][] = $r;
            if($r['parent_id'] == 0) $cats[$r['name']] = $r;
        }

        return @$cats;
    }

}
