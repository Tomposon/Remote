<?php

/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/1
 * Time: 21:25
 */
class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("company_model");
        $this->load->model("job_model");
        $this->load->model("apply_model");
        $this->load->helper('url');             //为了使用site_url()函数
    }


    public function register()
    {
        $data['title']="企业注册";
        $this->load->view("templates/header",$data);
        $this->load->view("company/register");
        $this->load->view("templates/footer");
    }

    public function register_action()
    {
        if(isset($_POST['company_id']))
        {
            $company['company_id']=$_POST['company_id'];
            $company['company_name']=$_POST['company_name'];
            $company['company_city']=$_POST['company_city'];
            $company['company_address']=$_POST['company_address'];
            $company['company_kind']=$_POST['company_kind'];
            $company['company_user_name']=$_POST['company_user_name'];
            $company['company_user_id']=$_POST['company_user_id'];
            $company['company_user_phone']=$_POST['company_user_phone'];
            $company['url']=$_POST['url'];
            $company['company_introduce']=$_POST['company_introduce'];
            $company['company_boss']=$_POST['company_boss'];
            $company['password']=$_POST['password'];


            if($this->company_model->check_exist($company['company_id']))
            {
                echo "1";
            }
            else{
                if($this->company_model->add_company($company))
                    echo "0";
                else echo "1";
            }
        }
        else echo "2";
    }



    public function login()
    {
        $data['title']="企业登录";
        $this->load->view("templates/header",$data);
        $this->load->view("company/login");
        $this->load->view("templates/footer");
    }

    public function login_action()
    {
        $id=$_POST['id'];
        $password=$_POST['password'];

        $data=$this->company_model->validate_company($id,$password);

        if(is_array($data))
        {
            $_SESSION['userdata']=$data;
            $_SESSION['has_login']=TRUE;
            ini_set('session.gc_maxlifetime',60*60*2);
            echo "0";
        }
        else if($data==1)
            echo "1";
        else if($data==2)
            echo "2";
    }

    public function add_job()
    {
        $data['title']="发布岗位";
        $this->load->view("templates/header",$data);
        $this->load->view("templates/nav",$data);
        $this->load->view("company/add_job");
        $this->load->view("templates/footer");
    }

    public function add_job_action()
    {
        if(isset($_POST['job_kind'])) {
            $maxseq=$this->job_model->get_sequence($_SESSION['userdata']['company_id'])+1;
            $job['job_id'] = $_SESSION['userdata']['company_id']."_{$maxseq}";
          //  $job['job_title'] = $_POST['job_title'];
            $job['company_id'] = $_SESSION['userdata']['company_id'];
            $job['company_name'] = $_SESSION['userdata']['company_name'];
            $job['sequence'] = $maxseq;
            $job['job_kind'] = $_POST['job_kind'];
            $job['job_city']=$_POST['job_city'];
            $job['job_area'] = $_POST['job_area'];
            $job['pay_min'] = $_POST['pay_min'];
            $job['pay_max'] = $_POST['pay_max'];
            $job['job_welfare'] = $_POST['job_welfare'];
            $job['job_other'] = $_POST['job_other'];
           // $job['job_skills'] = $_POST['job_skills'];
          //  $job['job_require'] = $_POST['job_require'];
            $job['job_name'] = $_POST['job_name'];
            $job['num_people'] = $_POST['num_people'];
            $job['now_people'] = 0;
            $job['insert_time']=time();



            if ($this->job_model->add_job($job)) {
                echo "0";
            }
            else echo "1";
        }
        else {
            //登录
        }
    }


    public function logout()
    {
        if(isset($_SESSION['has_login']))
        {
            unset($_SESSION['userdata']);
            unset($_SESSION['has_login']);
            //session_destroy();
            redirect(site_url()."/company/login");
        }
    }

    public function job_list($company_id)
    {
        $data['title']="职位列表";
        $data['jobs']=$this->job_model->get_jobs($company_id);
        $this->load->view("templates/header",$data);
        $this->load->view("templates/nav",$data);
        $this->load->view("company/job_list",$data);
        $this->load->view("templates/footer");
    }

    public function delete_job($job_id)
    {
        $this->job_model->delete_job($job_id);
        redirect(site_url()."/company/job_list/".$_SESSION['userdata']['company_id']);
    }

    public function job_info($job_id)
    {
        $data['title']="职位详细信息";
        $data['job']=$this->job_model->get_job_by_id($job_id);
        $this->load->view("templates/header",$data);
        $this->load->view("templates/nav",$data);
        $this->load->view("company/job_info",$data);
        $this->load->view("templates/footer");
    }

    public function update_job($job_id)
    {
        $data['title']="更新职位信息";
        $data['job']=$this->job_model->get_job_by_id($job_id);
        $this->load->view("templates/header",$data);
        $this->load->view("templates/nav",$data);
        $this->load->view("company/update_job",$data);
        $this->load->view("templates/footer");
    }

    public function update_job_action($job_id)
    {
        if(isset($_POST['job_kind'])) {


           // $job['job_title'] = $_POST['job_title'];
            $job['job_kind'] = $_POST['job_kind'];
            $job['job_area'] = $_POST['job_area'];
            $job['pay_min'] = $_POST['pay_min'];
            $job['pay_max'] = $_POST['pay_max'];
            $job['job_welfare'] = $_POST['job_welfare'];
            $job['job_other'] = $_POST['job_other'];
           // $job['job_skills'] = $_POST['job_skills'];
          //  $job['job_require'] = $_POST['job_require'];
            $job['job_name'] = $_POST['job_name'];
            $job['num_people'] = $_POST['num_people'];
            $job['now_people'] = 0;
            $job['insert_time']=time();


            if ($this->job_model->update_job($job_id,$job)) {
                echo "0";
            }
            else echo "1";
        }
        else echo "2";
    }

    public function apply_job_list()
    {
        if (isset($_SESSION['userdata'])) {
            $data['title'] = "职位申请记录";
            $data['applys']=array();
            $jobs = $this->job_model->get_jobs($_SESSION['userdata']['company_id']);
            foreach($jobs as $row)
            {
                $ret=$this->apply_model->get_apply($row['job_id']);
                if(!empty($ret))
                    array_push($data['applys'],$ret);
            }

            $this->load->view("templates/header",$data);
            $this->load->view("templates/nav",$data);
            $this->load->view("company/apply_job",$data);
            $this->load->view("templates/footer");



        } else redirect(site_url() . "/company/login");
    }

    public function company_info()
    {
        if(isset($_SESSION['userdata']))
        {
            $data['title']="公司信息";
            $data['company']=$this->company_model->get_company($_SESSION['userdata']['company_id']);

            $this->load->view("templates/header",$data);
            $this->load->view("templates/nav",$data);
            $this->load->view("company/company_info",$data);
            $this->load->view("templates/footer");
        }
    }

    public function update_company()
    {
        if(isset($_SESSION['userdata']))
        {
            $data['title']="修改公司信息";
            $data['company']=$this->company_model->get_company($_SESSION['userdata']['company_id']);

            $this->load->view("templates/header",$data);
            $this->load->view("templates/nav",$data);
            $this->load->view("company/update_company",$data);
            $this->load->view("templates/footer");
        }
    }

    public function update_company_action()
    {
        if(isset($_POST['company_name']))
        {
            $company['company_name']=$_POST['company_name'];
            $company['company_city']=$_POST['company_city'];
            $company['company_address']=$_POST['company_address'];
            $company['company_kind']=$_POST['company_kind'];
            $company['company_user_name']=$_POST['company_user_name'];
            $company['company_user_id']=$_POST['company_user_id'];
            $company['company_user_phone']=$_POST['company_user_phone'];
            $company['url']=$_POST['url'];
            $company['company_introduce']=$_POST['company_introduce'];
            $company['company_boss']=$_POST['company_boss'];

            if($this->company_model->update_company($_SESSION['userdata']['company_id'],$company))
                echo "0";
            else echo "1";
        }
        else echo "2";

    }


    public function update_company_account()
    {
        if(isset($_SESSION['userdata']))
        {
            $data['title']="修改企业账户信息";
            $this->load->view("templates/header",$data);
            $this->load->view("templates/nav",$data);
            $this->load->view("company/company_account",$data);
            $this->load->view("templates/footer");
        }

    }


    public function update_password()
    {
        if(isset($_POST['old_password']))
        {
            if($_SESSION['userdata']['password']!=$_POST['old_password'])
            {
                echo "1";
            }
            else if($_POST['old_password']==$_POST['new_password'])
            {
                echo "2";
            }
            else{
                $company['password']=$_POST['new_password'];
                if($this->company_model->update_company($_SESSION['userdata']['company_id'],$company))
                    echo "0";
                else return "2";
            }
        }
        else echo "3";
    }



}