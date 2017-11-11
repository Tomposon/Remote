<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 19:07
 */
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->helper('url');

        if(!isset($_SESSION['admindata']))
        {
            redirect(site_url()."/login/admin");
        }
    }

    public function user_list()
    {
        $data['title']="用户信息列表";
        $data['users']=$this->user_model->get_users();
        $this->load->view("templates/header",$data);
        $this->load->view("admin/nav");
        $this->load->view("admin/user_list",$data);
        $this->load->view("templates/footer");
    }

    public function logout()
    {
        if(isset($_SESSION['admin_has_login']))
        {
            unset($_SESSION['admindata']);
            unset($_SESSION['admin_has_login']);
            //session_destroy();
            redirect(site_url()."/login/admin");
        }
    }

}