<!DOCTYPE html>
<html>
<head>
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
    <meta content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>六星开源商城-六星教育</title>
    <meta name="keywords" content="六星教育" />
    <meta name="description" content="六星教育"/>
    <link rel="shortcut  icon" type="image/x-icon" href="/template/wap/default/public/images/favicon.ico" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/static/css/pre_foot.css">
    <link rel="stylesheet" type="text/css" href="/static/css/pro-detail.css">
    <link rel="stylesheet" type="text/css" href="/static/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/showbox.css">
    <link rel="stylesheet" href="/static/css/layer.css" id="layuicss-skinlayercss">
    <script src="/static/js/showbox.js"></script>
    <script src="/static/js/jquery.js"></script>
    <script type="text/javascript" src="/static/js/layer.js"></script>
    <script type="text/javascript">
        var CSS = "/template/wap/default/public/css";
        var APPMAIN='http://lms-blog.com/';
        var ADMINMAIN='http://lms-blog.com/admin';

        $(function(){
            showLoadMaskLayer();
        })

        $(document).ready(function(){
            hiddenLoadMaskLayer();
            //编写代码
        });

        //页面底部选中
        function buttomActive(event){
            clearButton();
            if(event == "#buttom_home"){
                $("#buttom_home").find("img").attr("src","/template/wap/default/public/images/home_check.png");
            }else if(event == "#buttom_classify"){
                $("#buttom_classify").find("img").attr("src","/template/wap/default/public/images/classify_check.png");
            }else if(event == "#buttom_stroe"){
                $("#buttom_stroe").find("img").attr("src","/template/wap/default/public/images/store_check.png");
            }else if(event == "#bottom_cart"){
                $("#bottom_cart").find("img").attr("src","/template/wap/default/public/images/cart_check.png");
            }else if(event == "#bottom_member"){
                $("#bottom_member").find("img").attr("src","/template/wap/default/public/images/user_check.png");
            }
        }

        function clearButton(){
            $("#buttom_home").find("img").attr("src","/template/wap/default/public/images/home_uncheck.png");
            $("#buttom_classify").find("img").attr("src","/template/wap/default/public/images/classify_uncheck.png");
            $("#buttom_stroe").find("img").attr("src","/template/wap/default/public/images/store_uncheck.png");
            $("#bottom_cart").find("img").attr("src","/template/wap/default/public/images/cart_uncheck.png");
            $("#bottom_member").find("img").attr("src","/template/wap/default/public/images/user_uncheck.png");
        }

        //显示加载遮罩层
        function showLoadMaskLayer(){
            $(".mask-layer-loading").fadeIn(300);
        }

        //隐藏加载遮罩层
        function hiddenLoadMaskLayer(){
            $(".mask-layer-loading").fadeOut(300);
        }
    </script>
    <style>
        body .sub-nav.nav-b5 dd i {margin: 3px auto 5px auto;}
        body .fixed.bottom {bottom: 0;}
        .mask-layer-loading{position: fixed;width: 100%;height: 100%;z-index: 999999;top: 0;left: 0;text-align: center;display: none;}
        .mask-layer-loading i,.mask-layer-loading img{text-align: center;color:#000000;font-size:50px;position: relative;top:50%;}
    </style>

    <link rel="stylesheet" type="text/css" href="/static/css/common-v4.4.css">
    <link rel="stylesheet" type="text/css" href="/static/css/member_address.css">
    <style>
        .addr-box {
            padding-top: 0px;
            text-align: center;
        }

        .addr-tip {
            font-size: 14px;
            color: #8f8f8f;
            margin-top: 10px;
        }

        .btn-save {
            margin-top: 40px;
        }
    </style>

</head>
<body class="body-gray">

<section class="head">
    <a class="head_back" href="javascript:window.history.go(-1)"><i class="icon-back"></i></a>
    <div class="head-title"></div>
</section>

<div class="motify" style="display: none;"><div class="motify-inner">弹出框提示</div></div>

<input type="hidden" id="ref_url" value="">
<input type="hidden" value="1" id="hidden_flag" />
<section class="head">
    <a class="head_back" id="backoutapp" href="http://lms-blog.com/member/index"><i class="icon-back"></i></a>
    <div class="head-title">我的收货地址</div>
</section>
<ul class="side-nav address" id="ul" style="background: #eee; padding: 0">
    @foreach($addresses as $address)
        <li id="157" style="margin-bottom: 5px; margin-top: 5px; background: #fff; padding: 0; margin-top: 10px;">
            <div style="background: url('//static/images/border_order_top_1.png'); height: 2px"></div>
            <div class="div-simply" style="display: inline-block; width: 100%; padding: 5px; border-bottom: 1px solid #e2e2e2;">
                <span class="payStatus">收货信息：</span>
                <span class="payStatus"><span class="name">{{$address->contact_name}}</span></span>
                <div style="display: inline-block; float: right;">
                    <a href="http://lms-blog.com/member/updatememberaddress?id=157&flag=1" style="display: inline-block; float: right;">【修改】</a>
                    <a href="javascript:void(0);" onclick="address_delete(157,0);" style="display: inline-block; float: right;">【删除】</a>
                </div>
            </div>
            <div class="div-simply" style="display: inline-block; width: 100%; padding: 5px;border-bottom: 1px solid #e2e2e2;" onclick='selectAddress(157,this)'>
                <span class="payStatus">手机号码：</span>
                <span class="payStatus"><span class="mobile">{{$address->contact_phone}}</span></span>
            </div>
            <a href="javascript:void(0)" class="classnone" style="padding: 5px;" id="mo" onclick='selectAddress(157,this)'>
                <span class="payStatus">详细地址：</span>
                <!-- <span class="address">广东省&nbsp;河源市&nbsp;龙川县&nbsp;黑他</span> -->
                <span class="address">{{$address->province}}&nbsp;{{$address->city}}&nbsp;{{$address->district}}&nbsp;{{$address->address}}</span>
                <span class="payStatus" style="float: right; line-height: 20px;"><i class="icon-success"></i></span>
            </a>
        </li>
@endforeach
<!-- <li id="156" class="current" style="margin-bottom: 5px; background: #fff; padding: 0; margin-top: 10px;">
		<div style="background: url('/static/images/border_order_top_1.png'); height: 2px"></div>
		<div class="div-simply" style="display: inline-block; width: 100%; padding: 5px; border-bottom: 1px solid #e2e2e2;">
			<span class="payStatus">收货信息：</span>
			<span class="payStatus"><span class="name">1&nbsp;&nbsp;</span></span>
			<div style="display: inline-block; float: right;">
				<a href="http://lms-blog.com/member/updatememberaddress?id=156&flag=1" style="display: inline-block; float: right;">【修改】</a>
									<a href="javascript:void(0);" onclick="address_delete(156,1);" style="display: inline-block; float: right;">【删除】</a>
							</div>
		</div>
		<div class="div-simply" style="display: inline-block; width: 100%; padding: 5px;border-bottom: 1px solid #e2e2e2;" onclick='selectAddress(156,this)'>
			<span class="payStatus">手机号码：</span>
			<span class="payStatus"><span class="mobile">13212341234</span></span>
		</div>
		<a href="javascript:void(0)" class="classnone" style="padding: 5px;" id="mo" onclick='selectAddress(156,this)'>
			<span class="payStatus">详细地址：</span>
			<span class="address">广东省&nbsp;梅州市&nbsp;大埔县&nbsp;11</span>
			<span class="payStatus" style="float: right; line-height: 20px;"><i class="icon-success"></i></span>
		</a>
	</li> -->
</ul>
<button class="btn-save" onclick="window.location.href='http://lms-blog.com/Member/addMemberAddress?flag=1';">新增收货地址</button>



<!-- 加载弹出层 -->
<div class="mask-layer-loading">
    <img src="/static/picture/mask_load.gif"/>
</div>

<script type="text/javascript">
    function selectAddress(id,obj){
        var ref_url = '';//$("#ref_url").val();
        var flag = "1";
        $.ajax({
            url: "http://lms-blog.com/member/updateaddressdefault",
            data: { "id": id },
            type: "post",
            success: function (res) {
                if (res["code"] > 0) {
                    $(".side-nav li").removeClass("current");
                    $(obj).parent().addClass("current");
                    //选择银行的时候也用到了，但是单店版没有
                    if(flag == "1"){
                        return;
                    }
                    if(ref_url == 'cart'){
                        window.location.href = "http://lms-blog.com/order/paymentorder";
                    }else{
                        window.location.reload();
                    }
                }else{
                    showBox(res["message"]);
                }
            }
        })
    }
    function address_delete(id,is_default){
        if(is_default == 1){
            showBox("默认地址不能删除");
            return;
        }
        $.ajax({
            url: "http://lms-blog.com/member/memberaddressdelete",
            data: { "id": id },
            type: "post",
            success: function (res) {
                //alert(JSON.stringify(res));
                if (res["code"] == 1) {
                    window.location.href=window.location.href;
                    showBox("删除成功!");
                } else {
                    showBox(res["outmessage"]);
                }
            }
        })
    }
    $("#backoutapp").click(function (){
        var json ={
            "center" : "1",
        }
        window.webkit.messageHandlers.center.postMessage(json);
    })
</script>

</body>
</html>
