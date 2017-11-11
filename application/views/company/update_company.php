<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 9:29
 */
?>

<script type="text/javascript">
    $(document).ready(
        function()
        {
            $('#update').click(
                function() {
                    //正则表达式
                    var pid=/^([A-Za-z])+[A-Za-z0-9]/;
                    var purl=/^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/\w+\.\w+)*$/;
                    var PATTERN_CHINAMOBILE = /^1(3[4-9]|5[012789]|8[23478]|4[7]|7[8])\d{8}$/; //移动号
                    var PATTERN_CHINAUNICOM = /^1(3[0-2]|5[56]|8[56]|4[5]|7[6])\d{8}$/; //联通号
                    var PATTERN_CHINATELECOM = /^1(3[3])|(8[019])\d{8}$/; //电信号

                    if($('#comp_name').val().length==0)
                    {
                        $('#comp_name_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司名称");
                        $('#comp_name').focus();
                    }
                    else if($('#comp_boss').val().length==0)
                    {
                        $('#comp_boss_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司法人姓名");
                        $('#comp_boss').focus();
                    }
                    else if($('#comp_kind').val()=="0")
                    {
                        $('#comp_kind_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请选择公司所属行业");
                        $('#comp_kind').focus();
                    }
                    else if($('#comp_city').val().length==0)
                    {
                        $('#comp_city_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司所在城市");
                        $('#comp_city').focus();
                    }
                    else if($('#comp_address').val().length==0)
                    {
                        $('#comp_address_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司地址");
                        $('#comp_address').focus();
                    }
                    /*
                     else if($('#comp_net').val().length==0)
                     {
                     $('#comp_net_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司主页网址");
                     $('#comp_net').focus();
                     }
                     */
                    else if($('#comp_net').val().length!=0&&!purl.test($('#comp_net').val()))
                    {
                        $('#comp_net_tip').html("<span class='glyphicon glyphicon-info-sign'><span>网址格式不正确");
                        $('#comp_net').focus();
                    }
                    else if($('#comp_intro').val().length==0)
                    {
                        $('#comp_intro_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司简介");
                        $('#comp_intro').focus();
                    }
                    else if($('#comp_intro').val().length<10)
                    {
                        $('#comp_intro_tip').html("<span class='glyphicon glyphicon-info-sign'><span>简介不能少于100字");
                        $('#comp_intro').focus();
                    }
                    else if($('#comp_intro').val().length>1000)
                    {
                        $('#comp_intro_tip').html("<span class='glyphicon glyphicon-info-sign'><span>简介不能多余1000字");
                        $('#comp_intro').focus();
                    }
                    else if($('#comp_assoc').val().length==0)
                    {
                        $('#comp_assoc_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司联系人姓名");
                        $('#comp_assoc').focus();
                    }
                    else if($('#comp_phone').val().length==0)
                    {
                        $('#comp_phone_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写公司联系手机号");
                        $('#comp_phone').focus();
                    }
                    else if(!PATTERN_CHINAMOBILE.test($('#comp_phone').val())&&!PATTERN_CHINAUNICOM.test($('#comp_phone').val())&&!PATTERN_CHINATELECOM.test($('#comp_phone').val()))
                    {
                        $('#comp_phone_tip').html("<span class='glyphicon glyphicon-info-sign'><span>手机号格式不正确");
                        $('#comp_phone').focus();
                    }
                    else{
                        post_url="<?php echo site_url()?>/company/update_company_action";
                        $.post(
                            post_url,
                            {
                                company_name:$('#comp_name').val(),
                                company_city:$('#comp_city').val(),
                                company_address:$('#comp_address').val(),
                                company_kind:$('#comp_kind').val(),
                                company_user_name:$('#comp_assoc').val(),
                                company_user_id:$('#comp_phone').val(),
                                company_user_phone:$('#comp_phone').val(),
                                url:$('#comp_net').val(),
                                company_introduce:$('#comp_intro').val(),
                                company_boss:$('#comp_boss').val(),
                            },
                            function(data)
                            {
                                if(data=="0")
                                    alert("更新成功");
                                else if(data=="1")
                                    alert("没有修改任何信息");
                            }
                        );
                    }
                }
            );

        }
    );
</script>





<!--注册表单   -->
<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top:20px;width: 100%;height: auto">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-edit"></span>&nbsp;企业信息修改</font>
    </div>


    <!--企业资料模块        -->
    <div style="width:100%;height:auto;margin-top:15px">
        <div style="float:left;margin-left: 0px;width:100%;height:5px;margin-top: 10px">
                <span class="glyphicon glyphicon-hand-right">
                </span>&nbsp;&nbsp;&nbsp;企业资料
        </div>
        <hr style="float:left;width:100%;border:solid 1px #0000FF">

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司名称：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_name" id="comp_name" type="text" value="<?php echo $company['company_name']?>">
            </div>
            <label style="margin-left: 10px" id="comp_name_tip">请输入公司名称,必须与营业执照一致，注册后不能修改</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司法人：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_boss" id="comp_boss" type="text" value="<?php echo $company['company_boss']?>">
            </div>
            <label style="margin-left: 10px" id="comp_boss_tip">请输入公司法人姓名</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">所属行业：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <select name="comp_kind" style="width:auto;height:25px" id="comp_kind">
                    <option value="0">==请选择==</option>
                    <option value="制造业">制造业</option>
                    <option value="商业服务">商业服务</option>
                    <option value="物流仓储">物流仓储</option>
                </select>
                <script type="text/javascript">
                    $('#comp_kind option[value=<?php echo $company['company_kind']?>]').attr("selected","selected");
                </script>
            </div>
            <label style="margin-left: 10px" id="comp_kind_tip">请选择公司所属行业</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">所在城市：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_city" id="comp_city" type="text" value="<?php echo $company['company_city']?>">
            </div>
            <label style="margin-left: 10px" id="comp_city_tip">请输入公司所在城市</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司地址：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_address" id="comp_address" type="text" value="<?php echo $company['company_address']?>">
            </div>
            <label style="margin-left: 10px" id="comp_address_tip">请输入公司地址</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司主页：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_net" type="text" id="comp_net" value="<?php echo $company['url']?>">
            </div>
            <label style="margin-left: 10px" id="comp_net_tip">请输入公司主页网址</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司简介：</div>
            <div style="float:left;text-align: left;padding-left: 10px;width:50%">
                <textarea name="comp_intro"  style="width:100%;height:100px" id="comp_intro"><?php echo $company['company_introduce']?></textarea>
            </div>
            <label style="margin-left: 110px;width:100%" id="comp_intro_tip">请尽可能详细填写资料，以确保贵公司获得好的招聘效果，不少于10字，限1000字以内</label>
        </div>
    </div>


    <!--联系资料模块        -->
    <div style="width:100%;height:auto;margin-top:15px">
        <div style="float:left;margin-left: 0px;width:100%;height:5px;margin-top: 50px">
                <span class="glyphicon glyphicon-hand-right">
                </span>&nbsp;&nbsp;&nbsp;联系资料
        </div>
        <hr style="float:left;width:100%;border:solid 1px #0000FF">

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">联系人：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_assoc" type="text" id="comp_assoc" value="<?php echo $company['company_user_name']?>">
            </div>
            <label style="margin-left: 10px" id="comp_assoc_tip">请输入联系人姓名</label>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">手机：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <input name="comp_phone" type="text" id="comp_phone" value="<?php echo $company['company_user_phone']?>">
            </div>
            <label style="margin-left: 10px" id="comp_phone_tip">请输入手机号</label>
        </div>
        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <button class="btn btn-warning" id="update" style="margin-left: 110px;width:100px">修改</button>
        </div>
    </div>
</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">
