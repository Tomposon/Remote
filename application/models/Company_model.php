<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/1
 * Time: 20:45
 */
class Company_model extends CI_Model
{

    /**
     * company表对应的model
     */
    const TBL="company";

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 添加一行企业记录
     * @param $company
     * @return bool
     */
    public function add_company($company)
    {
        $this->db->insert(self::TBL,$company);

        return ($this->db->affected_rows()==1)?TRUE:FALSE;
    }

    /**
     * 根据id来判断是否存在该用户
     * @param $id
     * @return bool
     */
    public function check_exist($id)
    {
        $query=$this->db->get_where(self::TBL,array("company_id"=>$id));
        return ($query->num_rows()==1)?TRUE:FALSE;
    }

    /**
     * 验证企业的账号和密码是否对应
     * @param $id
     * @param $password
     */
    public function validate_company($id,$password)
    {
        $query=$this->db->get_where(self::TBL,array("company_id"=>$id));

        if($query->num_rows()==1)
        {
            $data=$query->row_array();

            if(!empty($data))
            {
                if($data['password']==$password)
                    return $data;
                else return 2;                                //密码错误
            }
        }
        else return 1;                                        //id错误
    }

    public function get_company($company_id)
    {
        $query=$this->db->get_where(self::TBL,array("company_id"=>$company_id));
        return $query->row_array();
    }

    public function update_company($company_id,$company)
    {
        $this->db->update(self::TBL,$company,array("company_id"=>$company_id));
        return ($this->db->affected_rows()==1)?TRUE:FALSE;
    }
}