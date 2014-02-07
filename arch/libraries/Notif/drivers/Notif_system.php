<?php

/**
 * Notif_system.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2012/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (yyyy/mm/dd hh:mm:ss) (author)
 * 2012/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */

class Notif_system extends CI_Driver {
    function show() {
        $data = array(
            'self' => $this,
        );
        return $this->ci->load->view('libraries/notif_system_show', $data, true);
    }

    function notify($data) {
        if (is_array($data['user'])) {
            $data['user_id'] = $data['user']['id'];
        } else {
            $data['user_id'] = $data['user'];
        }
        unset($data['user']);
        $this->ci->_model('notification')->save($data);
    }
}