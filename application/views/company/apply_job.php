<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/18
 * Time: 17:03
 */
?>





<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;申请记录</font>
    </div>
    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">

    <?php
    if(!empty($applys)){
        ?>
        <table class="table table-hover" style="text-align: center">
            <style>
                th{
                    text-align: center;
                }
            </style>
            <tr>
                <th>申请人</th>
                <th>job_id</th>
                <th>工种</th>
                <th>工作名称</th>
                <th>工作地点</th>
                <th>申请时间</th>
            </tr>
            <?php foreach ($applys as $apply){ ?>
                <tr>
                    <td><a><?php echo $apply['user_name'] ?></a></td>
                    <td><a href="<?php echo site_url()?>/company/job_info/<?php echo $apply['jobid']?>"><?php echo $apply['jobid']?></a></td>
                    <td><?php echo $apply['job_kind']?></td>
                    <td><?php echo $apply['job_name']?></td>
                    <td><?php echo $apply['job_city'].$apply['job_area']?></td>
                    <td><?php echo date("Y-m-d",$apply['apply_time']) ?></td>
                </tr>
            <?php }?>
        </table>
    <?php }
    else {
        ?>

        <div class="alert alert-info alert-dismissable" style="width:20%;height:100px;margin-left:40%;margin-top: 100px">
            目前还没有任何申请记录
        </div>
    <?php }?>


</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">
