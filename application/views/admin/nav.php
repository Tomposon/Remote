<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 19:43
 */
?>


<div style="width:100%;height: 60px;border-bottom: solid #0000FF 5px;">

    <nav class="navbar navbar-default" role="navigation" style="height: 100%;background: white">
        <div class="container-fluid">
            <div class="navbar-header" style="float:left">
                <div style="float:left;margin-top: 15px;">
                    <font style="font-size: 20px">蓝领职宝&nbsp;|&nbsp;</font>
                </div>
                <div style="float:left;margin-top: 20px">
                    <font>平台运营</font>
                </div>
            </div>
            <div style="margin-left:200px">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top: 5px">
                            用户管理 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url()?>/admin/user_list">用户列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div style="float:right;margin-right:100px">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top: 5px">
                            <span class="glyphicon glyphicon-user"><?php echo $_SESSION['admindata']['id']?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url()?>/admin/logout  ">注销</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
