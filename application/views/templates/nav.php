<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 11:00
 */
?>
</head>
<body>
<!--导航栏    -->
<div style="width:100%;height: 60px;border-bottom: solid #0000FF 5px;">

    <nav class="navbar navbar-default" role="navigation" style="height: 100%;background: white">
        <div class="container-fluid">
            <div class="navbar-header" style="float:left">
                <div style="float:left;margin-top: 15px;">
                    <font style="font-size: 20px">蓝领职宝&nbsp;|&nbsp;</font>
                </div>
                <div style="float:left;margin-top: 20px">
                    <font>企业中心</font>
                </div>
            </div>
            <div style="margin-left:200px">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top: 5px">
                            职位管理 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url()?>/company/add_job">发布职位</a></li>
                            <li><a href="<?php echo site_url()?>/company/job_list/<?php echo $_SESSION['userdata']['company_id']?>">职位列表浏览</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top: 5px">
                            申请管理 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url()?>/company/apply_job_list">申请记录浏览</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div style="float:right;margin-right:100px">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top: 5px">
                            <span class="glyphicon glyphicon-user"><?php echo $_SESSION['userdata']['company_id']?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url()?>/company/company_info">企业信息</a></li>
                            <li><a href="<?php echo site_url()?>/company/update_company_account">密码管理</a></li>
                            <li><a href="<?php echo site_url()?>/company/logout  ">注销</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
