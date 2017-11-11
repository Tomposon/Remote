<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/10
 * Time: 16:45
 */
?>
<script type="text/javascript">
    var job_name_array=[
        ["普工","电工","叉车工","焊工"],
        ["保安","保洁","销售员","业务员","服务员","收银员"],
        ["分拣","包装","搬运工","快递送餐"],
        ["前台","人力","行政"],
        ["物业","银行","互联网"],
        ["乘服","协警","城管"],
    ];

    function get_job_name()
    {
        if($('#job_kind').val()!='0')
            $('#job_kind_tip').html("");
        var name=document.getElementById('job_name');
        var kind=document.getElementById('job_kind');
        var title=job_name_array[kind.selectedIndex-1];
        name.length=1;

        if($('#job_kind').val()=="其他") {
            $('#job_name').hide();
            $('#job_other_name').show();

        }
        else {
            $('#job_other_name').hide();
            $('#job_name').show();
            $('#job_other_name').val("");
            for (var i = 0; i < title.length; i++)
                name[i] = new Option(title[i], title[i]);
        }

    }

    $(document).ready(
        function()
        {
            get_job_name();
            if($('#job_kind').val()!="其他") {
                $('#job_name option[value=<?php echo $job['job_name']?>]').attr("selected", "selected");
            }
        }
    );

    $(document).ready(
        function () {
            $('#publish').click(
                function()
                {
                    $('.tip').html("");
                    var mon_num=/^[1-9]+[0-9]*/;
                    /*
                    if($('#job_title').val().length==0) {
                        $('#job_title_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写职位名称");
                        $('#job_title').focus();
                    }
                    */
                    if($('#job_kind').val()=="0")
                    {
                        $('#job_kind_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请选择工种");
                        $('#job_kind').focus();
                    }
                    else if($('#job_other_name').is(":visible")&&$('#job_other_name').val().length==0)
                    {
                        $('#job_name_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写工作名称");
                        $('#job_other_name').focus();
                    }
                    else if($('#job_area').val()=="0")
                    {
                        $('#job_area_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请选择工作区域");
                        $('#job_area').focus();
                    }
                    else if($('#pay_min').val().length==0||$('#pay_max').val().length==0)
                    {
                        $('#pay_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写薪酬范围吧");
                        $('#pay_max').focus();
                    }
                    else if(!mon_num.test($('#pay_min').val())||!mon_num.test($('#pay_max').val()))
                    {
                        $('#pay_tip').html("<span class='glyphicon glyphicon-info-sign'><span>金额格式不对");
                        $('#pay_min').focus();
                    }
                    else if(parseInt($('#pay_min').val())>=parseInt($('#pay_max').val()))
                    {
                        $('#pay_tip').html("<span class='glyphicon glyphicon-info-sign'><span>最高工资不得小于最低工资");
                        $('#pay_min').focus();
                    }
                    else if($('#job_welfare').val()=="")
                    {
                        $('#job_welfare_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写福利");
                        $('#job_welfare').focus();
                    }
                    /*
                    else if($('#job_skills').val().length==0)
                    {
                        $('#job_skills_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写技能");
                        $('#job_skills').focus();
                    }
                    else if($('#job_require').val().length==0)
                    {
                        $('#job_require_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写要求");
                        $('#job_require').focus();
                    }
                    */
                    else if($('#num_people').val().length==0)
                    {
                        $('#num_people_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写招聘人数");
                        $('#num_people').focus();
                    }
                    else if(!mon_num.test($('#num_people').val()))
                    {
                        $('#num_people_tip').html("<span class='glyphicon glyphicon-info-sign'><span>人数格式不对");
                    $('#num_people').focus();
                }
                    else{

                        if($('#job_other_name').val().length==0)
                            job_name=$('#job_name').val();
                        else job_name=$('#job_other_name').val();
                        var post_url="<?php echo site_url()?>/company/update_job_action/<?php echo $job['job_id']?>";
                        $.post(
                            post_url,
                            {
                              //  job_title:$('#job_title').val(),
                                job_kind:$('#job_kind').val(),
                                job_name:job_name,
                                job_city:$('#job_city').val(),
                                job_area:$('#job_area').val(),
                                pay_min:$('#pay_min').val(),
                                pay_max:$('#pay_max').val(),
                                job_welfare:$('#job_welfare').val(),
                            //    job_skills:$('#job_skills').val(),
                            //    job_require:$('#job_require').val(),
                                job_other:$('#job_other').val(),
                                num_people:$('#num_people').val()
                            },
                            function(data){
                                if(data=="0")
                                    alert("更新成功");
                                else if(data=="1")
                                    alert("更新失败");

                            }
                        );
                    }
                }
            );
        }
    );











</script>

</head>
<body>


<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-edit"></span>&nbsp;更新岗位</font>
    </div>

    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">

<!--    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">职位名称：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="job_title" id="job_title" type="text" value="<?php //echo $job['job_title']?>">
        </div>
        <label id="job_title_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>
    -->


    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">工种：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <select name="job_kind" id="job_kind" style="width:auto;height:25px" onchange="get_job_name()">
                <option value="0">==请选择工种==</option>
                <option value="制造业">制造业</option>
                <option value="商业服务">商业服务</option>
                <option value="物流仓储">物流仓储</option>
                <option value="文员">文员</option>
                <option value="客服">客服</option>
                <option value="公共服务">公共服务</option>
                <option value="其他">其他</option>
            </select>
            <script type="text/javascript">
                $('#job_kind option[value=<?php echo $job['job_kind']?>]').attr("selected","selected");
            </script>
        </div>

        <label id="job_kind_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">工作名称：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <select name="job_name" id="job_name" style="width:auto;height:25px">
                <option value="0">==请选择工作名称==</option>
            </select>

            <input id="job_other_name" value="<?php echo $job['job_name']?>">
        </div>
        <label id="job_name_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">工作区域：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <select name="job_city" style="width:auto;height:25px" id="job_city">
                <option value="武汉市">武汉市</option>
            </select>
            <select name="job_area" id="job_area" style="width:auto;height:25px">
                <option value="0">==请选择区域==</option>
                <option value="江岸区">江岸区</option>
                <option value="江汉区">江汉区</option>
                <option value="硚口区">硚口区</option>
                <option value="汉阳区">洪山区</option>
                <option value="武昌区">武昌区</option>
                <option value="洪山区">洪山区</option>
                <option value="东西湖区">东西湖区</option>
                <option value="汉南区">汉南区</option>
                <option value="江夏区">江夏区</option>
                <option value="黄陂区">黄陂区</option>
                <option value="新洲区">新洲区</option>
            </select>
            <script type="text/javascript">
                $('#job_area option[value=<?php echo $job['job_area']?>]').attr("selected","selected");
            </script>
        </div>
        <label id="job_area_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">薪酬范围：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="pay_min" id="pay_min" type="text" value="<?php echo $job['pay_min'] ?>" style="width: 80px">&nbsp;-&nbsp;<input name="pay_max" id="pay_max" type="text" value="<?php echo $job['pay_max']?>" style="width: 80px;">&nbsp;元/月
        </div>
        <label id="pay_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">福利：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <textarea name="job_welfare" id="job_welfare"  style="width: 500px;height: 100px"><?php echo $job['job_welfare']?></textarea>
        </div>
        <label id="job_welfare_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>

    <!--
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">技能：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="job_skills" id="job_skills" type="text" value="<?php //echo $job['job_skills']?>">
        </div>
        <label id="job_skills_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>
    -->

    <!--
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">要求：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <textarea name="job_require" id="job_require"  style="width: 500px;height: 100px" ><?php //echo $job['job_require']?></textarea>
        </div>
        <label id="job_require_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>
    -->

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">其他说明：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <textarea name="job_other" id="job_other"  style="width: 500px;height: 100px"><?php echo $job['job_other']?></textarea>
        </div>
        <label id="job_other_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <div style="float:left;width:100px;text-align: right">招聘人数：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="num_people" id="num_people" type="text" value="<?php echo $job['num_people']?>" style="width:50px">&nbsp;人
        </div>
        <label id="num_people_tip" class="tip" style="margin-left: 10px;color:red"></label>
    </div>
    <div style="float:left;margin-top:10px;margin-left:5%;width:100%">
        <button class="btn btn-warning" style="margin-left: 110px;width:100px" id="publish">更新</button>
    </div>

</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">
