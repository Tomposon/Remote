<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/7
 * Time: 22:38
 */
class Job_model extends CI_Model
{
    /**
     * jobs表
     */
    const TBL="jobs";

    public function __construct()
    {
        $this->load->database();
    }

    public function add_job($job)
    {
        $this->db->insert(self::TBL,$job);
        return ($this->db->affected_rows()==1)?TRUE:FALSE;
    }

    public function get_sequence($company_id)
    {
        $query=$this->db->query("select MAX(sequence) as maxseq from jobs where company_id='{$company_id}'");
        if($query->num_rows()==1)
        {
            $data=$query->row_array();
            return $data['maxseq'];
        }
        else return 3;
    }


    public function get_jobs($company_id)
    {
        $query=$this->db->get_where(self::TBL,array("company_id"=>$company_id));
        return $query->result_array();
    }


    public function delete_job($job_id)
    {
        $this->db->delete(self::TBL,array('job_id'=>$job_id));
        return ($this->db->affected_rows()==1)?TRUE:FALSE;
    }


    public function get_job_by_id($job_id)
    {
        $query=$this->db->get_where(self::TBL,array('job_id'=>$job_id));
        return $query->row_array();
    }

    public function update_job($job_id,$job)
    {
        $this->db->update(self::TBL,$job,array("job_id"=>$job_id));
        return ($this->db->affected_rows()>0)?TRUE:FALSE;
    }

}