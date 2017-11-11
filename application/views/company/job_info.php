<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/10
 * Time: 16:23
 */
?>




<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;职位详细信息</font>
    </div>

    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">

<!--    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">职位名称：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['job_title']?>
        </div>
    </div>
    -->


    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">工种：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['job_kind']?>
        </div>

    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">工作名称：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['job_name']?>
        </div>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">工作区域：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['job_city'].$job['job_area']?>
        </div>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">薪酬范围：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['pay_min']?>&nbsp;-&nbsp;<?php echo $job['pay_max']?>&nbsp;元/月
        </div>
        <label id="pay_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>


    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">福利：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php $str=preg_replace('(\n)','<br>',$job['job_welfare']);echo $str; ?>
        </div>
    </div>


    <!--
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">技能：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['job_skills']?>
        </div>
    </div>
    -->

    <!--
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">要求：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php $str=preg_replace('(\n)','<br>',$job['job_require']);echo $str; ?>
        </div>
    </div>
    -->
    <?php if($job['job_other']!=''){?>
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">其他说明：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php $str=preg_replace('(\n)','<br>',$job['job_other']);echo $str; ?>
        </div>
    </div>
    <?php }?>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">招聘人数：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <?php echo $job['num_people']?>&nbsp;人
        </div>
    </div>
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <a href="<?php echo site_url()?>/company/update_job/<?php echo $job['job_id']?>" style="margin-left: 110px"><button class="btn btn-warning" style="margin-left:10px">修改</button></a>
        <a href="<?php echo site_url()?>/company/delete_job/<?php echo $job['job_id']?> "><button class="btn btn-danger" style="margin-left:10px">删除</button></a>
    </div>

</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">
