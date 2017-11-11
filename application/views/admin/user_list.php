<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 19:10
 */
?>

</head>
<body>


<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;用户列表</font>
        <font style="float:right;font-size: 22px;color:#0000FF">共<?php echo count($users)?>个用户</font>
    </div>
    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">

    <?php
    if(!empty($users)){
        ?>
        <table class="table table-hover" style="text-align: center">
            <style>
                th{
                    text-align: center;
                }
            </style>
            <tr>
                <th>用户名</th>
                <th>姓名</th>
                <th>性别</th>
                <th>出生日期</th>
                <th>教育程度</th>
                <th>操作</th>
            </tr>
            <?php foreach ($users as $user){ ?>
                <tr>
                    <td><?php echo $user['user_name'] ?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $user['sex']?></td>
                    <td><?php echo $user['birth']?></td>
                    <td><?php echo $user['edu']?></td>
                    <td><a href="#"><button class="btn btn-primary">详细信息</button></a></td>
                </tr>
            <?php }?>
        </table>
    <?php }
    else {
        ?>

        <div class="alert alert-info alert-dismissable" style="width:20%;height:100px;margin-left:40%;margin-top: 100px">
            目前还没有任何用户
        </div>
    <?php }?>


</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">

