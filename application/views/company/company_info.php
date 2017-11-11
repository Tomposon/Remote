<?php
/**
 * Created by PhpStorm.
 * User: Mr.Chen
 * Date: 2017/11/4
 * Time: 8:56
 */
?>





<!--注册表单   -->
<div style="width:75%;height:auto;float:left;margin-left:12.5%;margin-top: 10px;border:solid #0000FF 1px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px">
    <div style="margin-top:20px;width: 100%;height: auto">
        <font style="font-size: 22px;color:#0000FF"><span class="glyphicon glyphicon-zoom-in"></span>&nbsp;企业信息</font>
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
                <?php echo $company['company_id']?>
            </div>
        </div>


    </div>

    <!--企业资料模块        -->
    <div style="width:100%;height:auto;margin-top:15px">
        <div style="float:left;margin-left: 0px;width:100%;height:5px;margin-top: 20px">
                <span class="glyphicon glyphicon-hand-right">
                </span>&nbsp;&nbsp;&nbsp;企业资料
        </div>
        <hr style="float:left;width:100%;border:solid 1px #0000FF">

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司名称：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_name']?>
            </div>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司法人：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_boss']?>
            </div>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">所属行业：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_kind']?>
            </div>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">所在城市：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_city']?>
            </div>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司地址：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_address']?>
            </div>
        </div>
        <?php if($company['url']!=''){
            ?>
        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司主页：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['url']?>
            </div>
        </div>
        <?php }?>
        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">公司简介：</div>
            <div style="float:left;text-align: left;padding-left: 10px;width:50%">
                <?php $str=preg_replace('(\n)','<br>',$company['company_introduce']);echo $str;?>
            </div>

        </div>
    </div>


    <!--联系资料模块        -->
    <div style="width:100%;height:auto;margin-top:15px">
        <div style="float:left;margin-left: 0px;width:100%;height:5px;margin-top: 20px">
                <span class="glyphicon glyphicon-hand-right">
                </span>&nbsp;&nbsp;&nbsp;联系资料
        </div>
        <hr style="float:left;width:100%;border:solid 1px #0000FF">

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">联系人：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_user_name']?>
            </div>
        </div>

        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <div style="float:left;width:100px;text-align:right">手机：</div>
            <div style="float:left;text-align: left;padding-left: 10px;">
                <?php echo $company['company_user_phone']?>
            </div>
        </div>
        <div style="float:left;margin-top:10px;margin-left:50px;width:100%">
            <a href="<?php echo site_url()?>/company/update_company"><button class="btn btn-warning" id="register" style="margin-left: 110px;width:100px">修改</button></a>
        </div>
    </div>
</div>

<hr style="float:left;width:100%;,margin-top:10px;border: solid #0000FF 3px;">
