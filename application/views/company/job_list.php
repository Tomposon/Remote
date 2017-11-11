<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/10
 * Time: 15:41
 */
?>




<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;职位列表</font>
    </div>
    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">

    <?php
        if(!empty($jobs)){
            ?>
    <table class="table table-hover" style="text-align: center">
        <style>
            th{
                text-align: center;
            }
        </style>
        <tr>
            <th>job_id</th>
<!--            <th>职位名称</th>-->
            <th>工种</th>
            <th>工作名称</th>
            <th>区域</th>
            <th>招聘人数</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        <?php foreach ($jobs as $job){ ?>
            <tr>
                <td><?php echo $job['job_id'] ?></td>
<!--                <td>--><?php //echo $job['job_title'] ?><!--</td>-->
                <td><?php echo $job['job_kind']?></td>
                <td><?php echo $job['job_name']?></td>
                <td><?php echo $job['job_area']?></td>
                <td><?php echo $job['num_people']?></td>
                <td><?php echo date("Y-m-d",$job['insert_time']) ?></td>
                <td><a href="<?php echo site_url()?>/company/job_info/<?php echo $job['job_id']?>"><button class="btn btn-primary">详细信息</button></a><a href="<?php echo site_url()?>/company/update_job/<?php echo $job['job_id']?>"><button class="btn btn-warning" style="margin-left:10px">修改</button></a><a href="<?php echo site_url()?>/company/delete_job/<?php echo $job['job_id']?> "><button class="btn btn-danger" style="margin-left:10px">删除</button></a></td>
            </tr>
        <?php }?>
    </table>
        <?php }
        else {
            ?>

            <div class="alert alert-info alert-dismissable" style="width:20%;height:100px;margin-left:40%;margin-top: 100px">
                目前还没有发布任何职位
            </div>
        <?php }?>


</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">
