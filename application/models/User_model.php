<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 18:20
 */
class User_model extends CI_Model
{
    const TBL="users";

    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $query=$this->db->get(self::TBL);
        return $query->result_array();
    }
}