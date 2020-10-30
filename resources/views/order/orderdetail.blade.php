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
<link rel="stylesheet" type="text/css" href="static/css/pre_foot_1.css">
<link rel="stylesheet" type="text/css" href="static/css/pro-detail_1.css">
<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min_1.css">
<link rel="stylesheet" type="text/css" href="static/css/showbox_1.css">
<link rel="stylesheet" href="static/css/layer_1.css" id="layuicss-skinlayercss">
<script src="static/js/showbox_1.js"></script>
<script src="static/js/jquery_1.js"></script>
<script type="text/javascript" src="static/js/layer_1.js"></script>
<script src="static/js/load_task_1.js" type="text/javascript"></script>
<script type="text/javascript">
var CSS = "/template/wap/default/public/css";
var APPMAIN='http://tp.23673.com/wap';
var ADMINMAIN='http://tp.23673.com/admin';

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

<link rel="stylesheet" type="text/css" href="static/css/foundation.css">
<link rel="stylesheet" type="text/css" href="static/css/normalize.css">
<link rel="stylesheet" type="text/css" href="static/css/common-v4.4.css">
<link rel="stylesheet" type="text/css" href="static/css/person-v4.4.css">
<script src="static/js/order.js" type="text/javascript"></script>

</head>
<body class="body-gray">

	<section class="head">
		<a class="head_back" href="javascript:window.history.go(-1)"><i class="icon-back"></i></a>
		<div class="head-title"></div>
	</section>

	<div class="motify" style="display: none;"><div class="motify-inner">弹出框提示</div></div>

<div class="main myorder">
	<section class="head">
		<a class="head_back" href="javascript:window.history.go(-1)"><i class="icon-back"></i></a>
		<div class="head-title">订单详情</div>
	</section>
</div>
<div class="order-detail mt-45">
	<section class="order-detail-infor">
		<div class="order-detail-sum clear">
			<div class="sum-r order-detail-r">
				<ul class="sum-r-ul">
					<li><span class="status">待发货</span></li>
					<li><span class="label">订单号：</span><span class="value">20180524222420000000003</span></li>
					<li><span class="label">订单状态：</span><span class="value">待发货</span></li>
					<li><span class="label">下单时间：</span><span class="value">2018-05-24 22:24:20</span></li>
					<li><span class="label">付款方式：</span><span class="value">货到付款</span></li>
					<li><span class="label">付款状态：</span><span class="value">已支付</span></li>
					<li><span class="label">配送方式：</span><span class="value">商家配送</span></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="order-detail-remark">
		<div class="remark-out clear">
			<div class="remark-l order-detail-l">
				<i class="icon-talks-small"></i>
			</div>
			<div class="remark-r order-detail-r">
				<ul class="remark-r-ul">
					<li class="name">
						<span class="label">买家留言</span>
					</li>
					<li>
												<span class="label">此订单没有留言</span>
											</li>
				</ul>
			</div>
		</div>
	</section>


	<section class="order-detail-address">
		<div class="address-out clear">
			<div class="address-l order-detail-l">
				<i class="icon-address-small"></i>
			</div>
			<div class="address-r order-detail-r">
				<ul class="address-r-ul">
											<li class="name">
							<span class="label">收货地址：</span>
							<span class="value">winner，18728701946，广东省&nbsp;河源市&nbsp;龙川县&nbsp;黑他</span>
						</li>
										</ul>
			</div>
		</div>
	</section>

	<section class="order-detail-remark">
		<div class="remark-out clear">
			<div class="remark-l order-detail-l">
				<i class="icon-talks-small"></i>
			</div>
			<div class="remark-r order-detail-r">
				<ul class="remark-r-ul">
					<li class="name">
						<span class="label">买家留言</span>
					</li>
					<li>
												<span class="label">此订单没有留言</span>
											</li>
				</ul>
			</div>
		</div>
	</section>

	<div class="list-myorder">
		<ul class="ul-product">
						<li>
				<span class="pic"><img src="static/picture/1500601152704.jpg" /></span>
				<div class="text">
					<span class="pro-name">
						<span style="color:#333333;">单鞋细高跟防水台鱼嘴女凉鞋2017春夏季新款复古刺绣高跟鞋40-42</span>
											</span>
					<br/>
					<div class="pro-pric">
						<span>价格:</span>
						<span style="color:#333333;">￥345.00</span>
					</div>
					<div class="pro-pric">
						<span class="color"></span>
						<span>数量:</span>
						<span style="color:#333333;">9</span>
					</div>
					<div class="pro-pric">
						<span>调价:</span>
						<span style="color:#333333;">0.00</span>
					</div>
<!-- 					<div class="pro-return"></div> -->
				</div>
			</li>
						<li>
				<span class="pic"><img src="static/picture/1500547407504_1.jpg" /></span>
				<div class="text">
					<span class="pro-name">
						<span style="color:#333333;">印花显瘦A字碎花真丝连衣裙女夏季2017新款欧洲站气质裙子女装潮</span>
											</span>
					<br/>
					<div class="pro-pric">
						<span>价格:</span>
						<span style="color:#333333;">￥359.00</span>
					</div>
					<div class="pro-pric">
						<span class="color"></span>
						<span>数量:</span>
						<span style="color:#333333;">1</span>
					</div>
					<div class="pro-pric">
						<span>调价:</span>
						<span style="color:#333333;">0.00</span>
					</div>
<!-- 					<div class="pro-return"></div> -->
				</div>
			</li>
					</ul>
		<div class="money-content">
			<div class="money-row">
				<div>
					<span>商品总金额：</span>
					<span class="price">￥3464.00</span>
				</div>

				<div>
					<span>运费</span>
					<span class="price">￥0.00</span>
				</div>


				<div>
					<span>实际需支付：</span>
					<span class="price"><b style="color:#f44;">￥3464.00</b></span>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="bottom-btn-row clear"></div> -->


	<div style="height:58px;"></div>
	<div class="fixed bottom">
		<div class="distribution-tip" id="distribution-tip" style="display: none;"></div>
		<dl class="sub-nav nav-b5">
			<dd id="buttom_home">
				<a href="http://tp.23673.com/wap">
					<div class="nav-b5-relative">
						<img src="static/picture/home_check_1.png"/>
						<span>首页</span>
					</div>
				</a>
			</dd>
			<dd id="buttom_classify">
				<a href="http://tp.23673.com/wap/goods/goodsClassificationList">
					<div class="nav-b5-relative">
						<img src="static/picture/classify_uncheck_1.png"/>
						<span>分类</span>
					</div>
				</a>
			</dd>
			<dd id="buttom_stroe" >
				<a href="http://tp.23673.com/wap/index/shopstreet">
					<div class="nav-b5-relative">
						<img src="static/picture/store_uncheck_1.png"/>
						<span>店铺街</span>
					</div>
				</a>
			</dd>
			<dd id="bottom_cart" >
				<a href="http://tp.23673.com/wap/goods/cart">
					<div class="nav-b5-relative">
						<img src="static/picture/cart_uncheck_1.png"/>
						<span>购物车</span>
					</div>
				</a>
			</dd>
			<dd id="bottom_member" >
				<a href="http://tp.23673.com/wap/Member/index">
					<div class="nav-b5-relative">
						<img src="static/picture/user_uncheck_1.png"/>
						<span>会员中心</span>
					</div>
				</a>
			</dd>
		</dl>
	</div>


	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="static/picture/mask_load_1.gif"/>
	</div>

</body>
</html>
