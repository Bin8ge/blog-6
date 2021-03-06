﻿<!DOCTYPE html>
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
<link rel="stylesheet" type="text/css" href="static/css/pre_foot.css">
<link rel="stylesheet" type="text/css" href="static/css/pro-detail.css">
<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="static/css/showbox.css">
<link rel="stylesheet" href="static/css/layer.css" id="layuicss-skinlayercss">
<script src="static/js/showbox.js"></script>
<script src="static/js/jquery.js"></script>
<script type="text/javascript" src="static/js/layer.js"></script>
<script src="static/js/load_task.js" type="text/javascript"></script>
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

<link rel="stylesheet" type="text/css" href="static/css/order.css">
<link rel="stylesheet" type="text/css" href="static/css/pro-detail.css">
<link rel="stylesheet" type="text/css" href="static/css/payment_order_new.css">
<link rel="stylesheet" type="text/css" href="static/css/payment_order_popup.css">

</head>
<body class="body-gray">

<section class="head">
	<a class="head_back" href="http://tp.23673.com/wap"><i class="icon-back"></i></a>
	<div class="head-title">订单结算</div>
</section>

	<div class="motify" style="display: none;"><div class="motify-inner">弹出框提示</div></div>

<div class="h50"></div>
<div id="addressok">
	<input type="hidden" id="addressid" value="157" />
	<div class="js-order-address express-panel js-edit-address express-panel-edit">
		<ul class="express-detail">
			<a href="http://tp.23673.com/wap/member/memberaddress?url=cart">
				<li class="clearfix">
					<span class="name">收货人：winner</span>
					<span class="tel">18728701946</span>
				</li>
				<li class="address-detail">收货地址：广东省&nbsp;河源市&nbsp;龙川县-黑他</li>
			</a>
		</ul>
	</div>
</div>

<div class="block-item express" style="padding: 0;"></div>
<section class="order">
		<div class="order-goods-item clearfix" data-subtotal="359.00">
		<div class="name-card block-item">
			<a href="http://tp.23673.com/wap/goods/goodsdetail?id=380" class="thumb">
				<img src="static/picture/1500547407504.jpg" alt="印花显瘦A字碎花真丝连衣裙女夏季2017新款欧洲站气质裙子女装潮" />
			</a>
			<div class="detail">
				<div class="clearfix detail-row">
					<div class="right-col">
						<input type="hidden" name="goods_skuid" value="1479" />
						<input type="hidden" name="goods_point_exchange"/>
						￥<span>359.00						</span>
					</div>
					<div class="left-col">
						<h3 style="font-weight: normal;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">
							<a href="javascript:;">印花显瘦A字碎花真丝连衣裙女夏季2017新款欧洲站气质裙子女装潮</a>
						</h3>
					</div>
				</div>
				<div class="clearfix detail-row">
					<div class="right-col">
						<div class=" c-gray-darker">
							×<span>1</span>
						</div>
					</div>
					<div class="left-col">
						<p class="c-gray-darker" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;"></p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="item-options" data-flag="pay" data-select="0">
		<label>支付方式</label>
		<span class="arrow-right color-gray">在线支付</span>
	</div>

	<div class="item-options" data-flag="distribution" data-select="0">
		<label>配送方式</label>
					<span class="arrow-right color-gray">商家配送</span>
				</div>

	<!-- 开启商家配送并且有物流公司显示 -->

	<div class="item-options" data-flag="pickup_address" data-id="0" data-count="4" style="display:none;">
		<label>自提地址</label>
		<span class="arrow-right color-gray"></span>
	</div>

		<div class="item-options">
		<label>使用余额<b class="account_balance">￥0.00</b></label>
		<span>
			使用<input type="text" id="account_balance" data-max="0.00" placeholder="0.00"/>元
		</span>
	</div>
		<div class="item-options" data-flag="invoice" data-select="0">
		<label>发票信息<span style="font-size:12px;color:#FF9800;font-weight:bold;"></span></label>
		<span class="arrow-right color-gray">不需要发票</span>
	</div>

	<div class="item-options invoice">
		<label><span style="font-size:12px;color:#FF9800;font-weight:bold;">将收取10%的发票税率</span></label>
	</div>

	<div class="item-options invoice">
		<label>发票抬头</label>
		<textarea id="invoice-title" maxlength="50" placeholder="个人或公司发票抬头"></textarea>
	</div>

	<div class="item-options invoice">
		<label>纳税人识别号</label>
		<textarea id="taxpayer-identification-number" maxlength="50" placeholder="纳税人识别号"></textarea>
	</div>


	<div class="item-options invoice" data-flag="invoice-content">
		<label>发票内容</label>
		<span class="arrow-right color-gray">选择发票内容</span>
	</div>

	<div class="item-options">
		<label>买家留言</label>
		<textarea id="leavemessage" placeholder="给卖家留言" maxlength="100"></textarea>
	</div>


	<div class="order-list">
		<h3>结算信息</h3>
		<p>
			<label>共<b class="orange-bold js-goods-num">1</b>种商品&nbsp;总计</label>
			<span>￥<b class="js-total-money">0.00</b></span>
		</p>

		<p>
			<label>运费</label>
			<span>￥<b id="express">0.00</b></span>
		</p>

		<p>
			<label>总优惠</label>
			<span>￥<b id="discount_money">0.00</b></span>
		</p>


				<p>
			<label>发票税额：</label>
			<span>￥<b id="invoice_tax_money">0.00</b></span>
		</p>
				<p>
			<label>使用余额：</label>
			<span>￥<b id="use_balance">0.00</b></span>
		</p>
			</div>
</section>

<div class="footer" style="min-height: 86px;">
	<div class="copyright">
		<div class="ft-copyright">
			<a href="http://tp.23673.com/wap" target="_blank">六星开源商城提供技术支持</a>
		</div>
	</div>
</div>


<div style="height: 50px"></div>
<div class="order-total-pay bottom-fix">
	<div class="pay-container clearfix">
		<span class="c-gray-darker font-size-12">应付金额：</span>
		<span class="font-size-16 theme-price-color">￥<b id="realprice">0.00</b></span>
				<button class="commit-bill-btn" onclick="submitOrder()">提交订单</button>
		<input type="hidden" id="hidden_count_point_exchange" value="0" />
		<input type="hidden" id="hidden_goods_sku_list" value="1479:1"/>
		<input type="hidden" id="hidden_discount_money" value="0.00" />
		<input type="hidden" id="hidden_express" value="0.00" />
		<input type="hidden" id="hidden_count_money" value="359.00" />
		<input type="hidden" id="count_point_exchange" value="0"/>
		<input type="hidden" id="hidden_full_mail_money" value="10.00"/>
		<input type="hidden" id="hidden_full_mail_is_open" value="0"/>
		<input type="hidden" id="goods_sku_list" value="1479:1" />
		<input type="hidden" id="hidden_order_invoice_tax" value="10"/>
	</div>
</div>

<!----------------------------- 弹出层 ------------------------------>
<div class="mask-layer"></div>


<!-- 选择支付方式弹出框 -->
<div class="mask-layer-control" data-flag="pay">
	<div class="header">选择支付方式<span class="close"></span></div>
	<div class="list">
		<ul>
			<li class="item active" data-flag="0">
				<div class="check-img"></div>
				<div class="single">在线支付</div>
			</li>
			<!-- 为了用户更好的体验和理解，只要开启了货到付款就显示，不再考虑配送方式是否开启，是否有物流公司等 -->
<!-- 		if condition="$shop_config.order_delivery_pay && $shop_config.seller_dispatching && count($express_company_list)"	 -->
						<li class="item" data-flag="4">
				<div class="check-img"></div>
				<div class="single">货到付款</div>
			</li>
					</ul>
	</div>
	<div class="footer">
		<button class="btn-green" style="margin: 0px;">确定</button>
	</div>
</div>
<!-- 选择支付方式弹出框 -->

<!-- 选择配送方式弹出框 -->
<div class="mask-layer-control" data-flag="distribution">
	<div class="header">选择配送方式<span class="close"></span></div>
		<div class="list">
		<ul>
			<!-- 为了用户更好的体验和理解，只要开启了商家配送，就显示。不考虑是否有物流公司 -->
<!-- 			if condition="$shop_config.seller_dispatching && count($express_company_list)" -->
						<li class="item active" data-flag="1">
				<div class="check-img"></div>
				<div class="single">商家配送</div>
			</li>
					</ul>
	</div>
	<div class="footer">
		<button class="btn-green" style="margin: 0px;">确定</button>
	</div>
	</div>
<!-- 选择配送方式弹出框 -->


<!-- 选择发票信息弹出框 -->
<div class="mask-layer-control" data-flag="invoice">
	<div class="header">选择发票<span class="close"></span></div>
	<div class="list">
		<ul>
			<li class="item active" data-flag="0">
				<div class="check-img"></div>
				<div class="single">不需要发票</div>
			</li>
			<li class="item" data-flag="1">
				<div class="check-img"></div>
				<div class="single">需要发票</div>
			</li>
		</ul>
	</div>
	<div class="footer">
		<button class="btn-green" style="margin: 0px;">确定</button>
	</div>
</div>
<!-- 选择发票信息弹出框 -->

<!-- 选择发票内容信息弹出框 -->
<div class="mask-layer-control" data-flag="invoice-content">
	<div class="header">选择发票内容<span class="close"></span></div>
	<div class="list">
		<ul>
						<li class="item active">
				<div class="check-img"></div>
				<div class="single">办公</div>
			</li>
						<li class="item ">
				<div class="check-img"></div>
				<div class="single">建材</div>
			</li>
					</ul>
	</div>
	<div class="footer">
		<button class="btn-green" style="margin: 0px;">确定</button>
	</div>
</div>
<!-- 选择发票内容信息弹出框 -->
<!----------------------------- 弹出层 ------------------------------>




	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="static/picture/mask_load.gif"/>
	</div>

<script type="text/javascript" src="static/js/payment_order.js"></script>

</body>
</html>
