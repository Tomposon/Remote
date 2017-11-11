<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/18
 * Time: 16:54
 */
class Apply_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_apply($job_id)
    {
        $query=$this->db->query("select apply.job_id as jobid,user_name,job_kind,job_name,job_city,job_area,apply_time from apply,jobs,users where apply.job_id='{$job_id}' and apply.job_id=jobs.job_id and apply.staff_id=users.user_name");
        return $query->row_array();
    }
}