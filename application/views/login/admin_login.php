<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 19:55
 */
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#login').click(
            function(){
                $('#idtip').html("");
                $('#passtip').html("");
                if($('#id').val().length==0)
                {
                    $('#idtip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写用户名");
                    $('#id').focus();
                }
                else if($('#password').val().length==0)
                {
                    $('#passtip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写密码");
                }
                else{

                    var post_url="<?php echo site_url()?>/login/admin_login_action";


                    $.post(
                        post_url,
                        {id:$('#id').val(),password:$('#password').val()},
                        function(data)
                        {
                            if(data=="1"){
                                $('#idtip').html("<span class='glyphicon glyphicon-remove-circle' style='font-size:15px;color:red'>用户名错误</span>");
                                $('#id').focus();
                            }
                            else if(data=="2")
                            {
                                $('#passtip').html("<span class='glyphicon glyphicon-remove-circle' style='font-size:15px;color:red'>密码错误</span>");
                                $('#password').focus();
                            }
                            else if(data=="0")
                                window.location.href="<?php echo site_url()?>/admin/user_list";
                        }
                    );
                }
            }
        );
    });
</script>
</head>
<body>
<!--导航栏    -->
<div style="width:100%;height: 60px;border-bottom: solid #0000FF 5px;">
    <div style="float:left;margin-top: 15px;margin-left:20px;"><font style="font-size: 20px">蓝领职宝&nbsp;|&nbsp;</font></div><div style="float:left;margin-top: 20px"><font>平台运营</font></div></div>

</div>

<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-user"></span>管理员登录</font>
    </div>

    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">

    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <div style="float:left;width:100px;text-align: right">用户名：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="id" id="id" type="text">
        </div>
        <label id="idtip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <div style="float:left;width:100px;text-align: right">密码：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="password" id="password" type="password">
        </div>
        <label id="passtip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <button class="btn btn-info" id="login" style="margin-left: 110px">登录</button>
        <!--            <a href="" style="margin-left:55px">忘记密码?</a>-->
    </div>




</div>

