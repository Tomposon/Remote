<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 11:26
 */
?>

<script type="text/javascript">
    $(document).ready(
        function()
        {
            $('#update').click(
                function()
                {
                    $('#password_tip').html("");
                    $('#npassword_tip').html("");
                    $('#anpassword_tip').html("");
                    if ($('#password').val().length == 0) {
                        $('#password_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写旧密码");
                        $('#password').focus();
                    }
                    else if($('#npassword').val().length==0)
                    {
                        $('#npassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请填写新密码");
                        $('#npassword').focus();
                    }
                    else if($('#npassword').val().length<6)
                    {
                        $('#npassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>密码长度不能小于6");
                        $('#npassword').focus();
                    }
                    else if($('#npassword').val().length>16)
                    {
                        $('#npassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>密码长度不能大于16");
                        $('#password').focus();
                    }
                    else if ($('#anpassword').val().length == 0) {
                        $('#anpassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>请确认密码");
                        $('#acpassword').focus();
                    }
                    else if ($('#npassword').val() != $('#anpassword').val())
                    {
                        $('#anpassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>两次密码不一致");
                        $('#acpassword').focus();
                    }
                    else{
                        var post_url="<?php echo site_url()?>/company/update_password";
                        $.post(
                            post_url,
                            {
                                old_password:$('#password').val(),
                                new_password:$('#npassword').val()
                            },
                            function (data) {
                                if(data=="0") {
                                    alert("密码修改成功，跳转至登录界面");
                                    window.location="<?php echo site_url()?>/company/login";
                                }
                                else if(data=="1")
                                    $('#password_tip').html("<span class='glyphicon glyphicon-remove-circle'><span>旧密码不正确");
                                else if(data=="2")
                                    $('#npassword_tip').html("<span class='glyphicon glyphicon-info-sign'><span>新密码和旧密码一样");
                            }
                        );
                    }
                }

            );
        }
    );
</script>


<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top: 20px;width: 100%;height: 15px">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-user"></span>密码管理</font>
    </div>

    <hr style="float:left;width:100%;border: solid 0.5px #0000FF;">


    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <div style="float:left;width:100px;text-align: right">旧密码：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="password" id="password" type="password">
        </div>
        <label id="password_tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <div style="float:left;width:100px;text-align: right">新密码：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="npassword" id="npassword" type="password">
        </div>
        <label id="npassword_tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <div style="float:left;width:100px;text-align: right">确认新密码：</div>
        <div style="float:left;text-align: left;padding-left: 10px;">
            <input name="anpassword" id="anpassword" type="password">
        </div>
        <label id="anpassword_tip" style="margin-left: 10px;color:red"></label>
    </div>

    <div style="float:left;margin-top:10px;margin-left:30%;width:100%">
        <button class="btn btn-info" id="update" style="margin-left: 110px">修改</button>
        <!--            <a href="" style="margin-left:55px">忘记密码?</a>-->
    </div>
