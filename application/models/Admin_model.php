<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 19:48
 */
class Admin_model extends CI_Model
{
    const TBL="admin";
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 根据id来判断是否存在该adminstrator
     * @param $id
     * @return bool
     */
    public function check_exist($id)
    {
        $query=$this->db->get_where(self::TBL,array("id"=>$id));
        return ($query->num_rows()==1)?TRUE:FALSE;
    }

    /**
     * 验证管理员的账号和密码是否对应
     * @param $id
     * @param $password
     */
    public function validate_admin($id,$password)
    {
        $query=$this->db->get_where(self::TBL,array("id"=>$id));

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

}