<?php

class contact_model extends app_base_model{

    function _all_contact() {
        $sql = "SELECT * FROM contact WHERE status = 1 ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

}


 ?>