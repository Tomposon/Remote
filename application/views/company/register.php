<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/10/1
 * Time: 20:52
 */?>

    <script type="text/javascript">
        $(document).ready(
            function()
            {
                $('#register').click(
                    function() {
                        //正则表达式
                        var pid=/^([A-Za-z])+[A-Za-z0-9]/;
                        var purl=/^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/\w+\.\w+)*$/;
                        var PATTERN_CHINAMOBILE = /^1(3[4-9]|5[012789]|8[23478]|4[7]|7[8])\d{8}$/; //移动号
                        var PATTERN_CHINAUNICOM = /^1(3[0-2]|5[56]|8[56]|4[5]|7[6])\d{8}$/; //联通号
                        var PATTERN_CHINATELECOM = /^1(3[3])|(8[019])\d{8}$/; //电信号

                        if ($('#id').val().length == 0) {
                            $('#id_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写用户名");
                            $('#id').focus();
                        }
                        else if($('#id').val().length<4)
                        {
                            $('#id_tip').html("<span class='glyphicon glyphicon-info-sign'><span>用户名长度不能小于4");
                            $('#id').focus();
                        }
                        else if($('#id').val().length>26)
                        {
                            $('#id_tip').html("<span class='glyphicon glyphicon-info-sign'><span>用户名长度不能大于26");
                            $('#id').focus();
                        }
                        else if(!pid.test($('#id').val()))
                        {
                            $('#id_tip').html("<span class='glyphicon glyphicon-info-sign'><span>4~26个数字或字母组成,必须以字母开头!");
                            $('#id').focus();
                        }
                        else if ($('#password').val().length == 0) {
                            $('#password_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写密码");
                            $('#password').focus();
                        }
                        else if($('#password').val().length<6)
                        {
                            $('#password_tip').html("<span class='glyphicon glyphicon-info-sign'><span>密码长度不能小于6");
                            $('#password').focus();
                        }
                        else if($('#password').val().length>16)
                        {
                            $('#password_tip').html("<span class='glyphicon glyphicon-info-sign'><span>密码长度不能大于16");
                            $('#password').focus();
                        }
                        else if ($('#acpassword').val().length == 0) {
                            $('#acpassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请确认密码");
                            $('#acpassword').focus();
                        }
                        else if ($('#password').val() != $('#acpassword').val())
                        {
                            $('#acpassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>两次密码不一致");
                            $('#acpassword').focus();
                        }
                        else if($('#comp_name').val().length==0)
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
                            $('#comp_intro_tip').html("<span class='glyphicon glyphicon-info-sign'><span>简介不能少于10字");
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
                            post_url="<?php echo site_url()?>/company/register_action";
                            $.post(
                                post_url,
                                {
                                    company_id:$('#id').val(),
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
                                    password:$('#password').val()
                                },
                                function(data)
                                {
                                    if(data=="0")
                                        alert("注册成功");
                                    else if(data=="1")
                                        alert("该用户名已存在");
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
    <!--导航栏    -->
    <div style="width:100%;height: 60px;border-bottom: solid #0000FF 5px;">
        <div style="float:left;margin-top: 15px;margin-left:20px;"><font style="font-size: 20px">蓝领职宝&nbsp;|&nbsp;</font></div><div style="float:left;margin-top: 20px"><font>企业中心</font></div></div>

    </div>

    <!--注册表单   -->
    <div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
        <div style="margin-top:20px;width: 100%;height: auto">
            <font style="font-size: 22px;color:#0000FF">企业注册</font>
            <a href="<?php echo site_url()?>/company/login" style="margin-left:20px">已经注册，前往登录</a>
        </div>

        <!--  账户资料模块      -->
        <div style="width:100%;height:auto;margin-top:15px">
            <div style="float:left;margin-left: 0px;width:100%;height:5px">
                <span class="glyphicon glyphicon-hand-right">
                </span>&nbsp;&nbsp;&nbsp;账户资料
            </div>
            <hr style="float:left;width:100%;border: solid 1px #0000FF;">

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align: right">用户名：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="id" id="id" type="text">
                </div>
                <label style="margin-left: 10px;" id="id_tip">4~26个数字或字母组成,必须以字母开头!</label>
            </div>
            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align: right">密码：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="password" type="password" id="password">
                </div>
                <label style="margin-left: 10px" id="password_tip">6～16个字符，区分大小写</label>
            </div>
            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align: right">确认密码：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="acpassword" id="acpassword" type="password">
                </div>
                <label style="margin-left: 10px" id="acpassword_tip">请再次输入密码</label>
            </div>


        </div>

        <!--企业资料模块        -->
        <div style="width:100%;height:auto;margin-top:15px">
            <div style="float:left;margin-left: 0px;width:100%;height:5px;margin-top: 50px">
                <span class="glyphicon glyphicon-hand-right">
                </span>&nbsp;&nbsp;&nbsp;企业资料
            </div>
            <hr style="float:left;width:100%;border:solid 1px #0000FF">

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">公司名称：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="comp_name" id="comp_name" type="text">
                </div>
                <label style="margin-left: 10px" id="comp_name_tip">请输入公司名称,必须与营业执照一致，注册后不能修改</label>
            </div>

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">公司法人：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="comp_boss" id="comp_boss" type="text">
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
                </div>
                <label style="margin-left: 10px" id="comp_kind_tip">请选择公司所属行业</label>
            </div>

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">所在城市：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="comp_city" id="comp_city" type="text">
                </div>
                <label style="margin-left: 10px" id="comp_city_tip">请输入公司所在城市</label>
            </div>

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">公司地址：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="comp_address" id="comp_address" type="text">
                </div>
                <label style="margin-left: 10px" id="comp_address_tip">请输入公司地址</label>
            </div>

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">公司主页：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="comp_net" type="text" id="comp_net">
                </div>
                <label style="margin-left: 10px" id="comp_net_tip">请输入公司主页网址</label>
            </div>

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">公司简介：</div>
                <div style="float:left;text-align: left;padding-left: 10px;width:50%">
                    <textarea name="comp_intro"  style="width:100%;height:100px" id="comp_intro"></textarea>
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
                    <input name="comp_assoc" type="text" id="comp_assoc">
                </div>
                <label style="margin-left: 10px" id="comp_assoc_tip">请输入联系人姓名</label>
            </div>

            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <div style="float:left;width:100px;text-align:right">手机：</div>
                <div style="float:left;text-align: left;padding-left: 10px;">
                    <input name="comp_phone" type="text" id="comp_phone">
                </div>
                <label style="margin-left: 10px" id="comp_phone_tip">请输入手机号</label>
            </div>
            <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
                <button class="btn btn-warning" id="register" style="margin-left: 110px;width:100px">注册</button>
            </div>
        </div>
    </div>

    <hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">





