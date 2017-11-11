<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 19:41
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->helper("url");
    }


    public function admin()
    {
        $data['title']="管理员登录";
        $this->load->view("templates/header",$data);
        $this->load->view("login/admin_login");
        $this->load->view("templates/footer");
    }

    public function admin_login_action()
    {
        $id=$_POST['id'];
        $password=$_POST['password'];

        $data=$this->admin_model->validate_admin($id,$password);

        if(is_array($data))
        {
            $_SESSION['admindata']=$data;
            $_SESSION['admin_has_login']=TRUE;
            ini_set('session.gc_maxlifetime',60*60*2);
            echo "0";
        }
        else if($data==1)
            echo "1";
        else if($data==2)
            echo "2";
    }


}