<!DOCTYPE html>
<html>
<head>
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1" />
    <meta content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>六星开源商城-六星教育</title>
    <meta name="keywords" content="六星教育" />
    <meta name="description" content="六星教育" />
    <link rel="shortcut  icon" type="image/x-icon" href="/template/wap/default/public/images/favicon.ico" media="screen" />
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
        var APPMAIN = 'http://lms-blog.com/';
        var ADMINMAIN = 'http://lms-blog.com/admin';

        $(function() {
            showLoadMaskLayer();
        })

        $(document).ready(function() {
            hiddenLoadMaskLayer();
            //编写代码
        });

        //页面底部选中
        function buttomActive(event) {
            clearButton();
            if (event == "#buttom_home") {
                $("#buttom_home").find("img").attr("src", "/static/images/home_check.png");
            } else if (event == "#buttom_classify") {
                $("#buttom_classify").find("img").attr("src", "/static/images/classify_check.png");
            } else if (event == "#buttom_stroe") {
                $("#buttom_stroe").find("img").attr("src", "/static/images/store_check.png");
            } else if (event == "#bottom_cart") {
                $("#bottom_cart").find("img").attr("src", "/static/images/cart_check.png");
            } else if (event == "#bottom_member") {
                $("#bottom_member").find("img").attr("src", "/static/images/user_check.png");
            }
        }
        function clearButton() {
            $("#buttom_home").find("img").attr("src", "/static/images/home_uncheck.png");
            $("#buttom_classify").find("img").attr("src", "/static/images/classify_uncheck.png");
            $("#buttom_stroe").find("img").attr("src", "/static/images/store_uncheck.png");
            $("#bottom_cart").find("img").attr("src", "/static/images/cart_uncheck.png");
            $("#bottom_member").find("img").attr("src", "/static/images/user_uncheck.png");
        }

        //显示加载遮罩层
        function showLoadMaskLayer() {
            $(".mask-layer-loading").fadeIn(300);
        }
        //隐藏加载遮罩层
        function hiddenLoadMaskLayer() {
            $(".mask-layer-loading").fadeOut(300);
        }
    </script>
    <style>
        body .sub-nav.nav-b5 dd i {
            margin: 3px auto 5px auto;
        }

        body .fixed.bottom {
            bottom: 0;
        }
        .mask-layer-loading {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 999999;
            top: 0;
            left: 0;
            text-align: center;
            display: none;
        }
        .mask-layer-loading i,
        .mask-layer-loading img {
            text-align: center;
            color: #000000;
            font-size: 50px;
            position: relative;
            top: 50%;
        }
    </style>
    <link rel="stylesheet" href="static/css/order.css">
    <link rel="stylesheet" type="text/css" href="static/css/cart.css">
    <script src="static/js/cart.js" type="text/javascript"></script>
    <script type="text/javascript" src="static/js/weixincommon.js"></script>
</head>
<body class="body-gray">
<section class="head">
    <a class="head_back" id="head_back" href="javascript:window.history.go(-1)"><i class="icon-back"></i></a>
    <div class="head-title">购物车</div>
</section>
<div class="motify" style="display: none;">
    <div class="motify-inner">弹出框提示</div>
</div>
<div class="popup" id="popup" style="display: none"></div>
<div class="h50"></div>
<div class="cart-detail">
    <section class="cart-prolist">
        @foreach($cartItems as $item)
            <ul class="cart-prolist-ul" style="border: 0;">
                <li data-parent-shopid="0">
                    <h2 class="title">
                        <div class="custom-store-img"></div>
                        店铺名称：{{$item->productSku->product->shop->name}}
                        <div class="cart_ed">
                            <a id="cart_edit{{$item->productSku->product->shop->id}}" data-shopid="{{$item->productSku->product->shop->id}}" onclick="cart_edit(this,{{$item->productSku->product->shop->id}})" style="display: block;">编辑</a>
                            <a id="edit_success{{$item->productSku->product->shop->id}}" onclick="cart_succ(this,{{$item->productSku->product->shop->id}})" style="display: none;">完成</a>
                        </div>
                    </h2>
                </li>
                <li class="cart-list-li" data-shopid="{{$item->productSku->product->shop->id}}">
                    <div class="checkbox" is_check="yes" is_del='no' style="background-image: url('static/picture/cartp1.png')">
                    </div>
                    <div class="product">
                        <div class="pic">
                            <a href="{{ route('products.show',[$item->productSku->product_id]) }}">
                                <img src="{{$item->productSku->product->image}}" alt="商品图片" width="100%" height="50px">
                            </a>
                        </div>
                        <div class="info">
                            <p class="info-name">
                                <a href="{{ route('products.show',[$item->productSku->product_id]) }}">{{$item->productSku->product->long_title}}<span><br /></span></a>
                            </p>
                        </div>
                    </div>
                    <div class="number">
                        ¥<span name="goods_price">{{$item->productSku->price}}</span>
                        ×<span name="succ_amount">{{$item->amount}}</span>
                        <div name="edit_num{{$item->productSku->product->shop->id}}" style="display: none;">
								<span class="ui-number">
									<button type="button" class="decrease" onclick="Cart.changeBar(&#39;-&#39;,{{$item->productSku->id}},this)" title="减">-</button>
									<input class="num" name="quantity" autocomplete="off" data-default-num="{{$item->amount}}" value="{{$item->amount}}" min="1" max="999" max_buy="0" data-sku_id="{{$item->productSku->id}}" data-cartid="{{$item->id}}" data-shopid="{{$item->productSku->product->shop->id}}">
									<button type="button" class="increase" onclick="Cart.changeBar(&#39;+&#39;,{{$item->productSku->id}},this)" title="加">+</button>
								</span>
                        </div>
                    </div>
                </li>
            </ul>
        @endforeach
        收货地址选择：
        <select name="address">
            @foreach($addresses as $address)
                <option value="{{$address->id}}">{{ $address->full_address }} {{ $address->contact_name }} {{ $address->contact_phone }}</option>
            @endforeach
        </select>
        </br>
        <textarea style="resize:none;width:500px;height:200px;" name="order_items">
				</textarea>
    </section>

</div>
<input type="hidden" id="countlist" value="1">
<section class="cart-none" id="cart-none" style="display: none">
    <i class="cart-big"></i>
    <p class="text">您的购物车还没有商品！</p>
    <a href="http://tp.23673.com/wap" class="btn">去逛逛</a>
</section>
<div class="fixed bottom">
    <div class="btn_wrap btn_wrap_static">
        <div class="btn ttn_server" id="div_selected">
            <div style="float: left;height: 20px;width: 20px;padding-left:10px;">
                <img src="/static/picture/cartp2.png" is_check="yes" is_del="no" id="select_all" style="width:100%;" />
            </div>
            <span id="sel_text">全选</span>
        </div>
        <div id="price_info">
            合计： ¥<span id="orderprice" class="price"></span>
            <br />
            <!-- <span style="color: #999;">不含运费</span> -->
        </div>
        <button class="btn btn_buy" onclick="settlement()">
            <span id="settlement">结算()</span>
        </button>
    </div>
</div>
<div class="h60"></div>
<script type="text/javascript">
    var cart1 = "static/picture/payment_select.png";
    var cart2 = "static/picture/cartp1.png";
    //页面加载触发事件
    $(function() {
        if (parseInt($("#countlist").val()) == 0) {
            $(".cart-prolist").hide();
            $("#cart-none").show();
            $(".fixed.bottom").hide();
        }
    });
</script>
<script type="text/javascript">
    $("#head_back").click(function() {
        var json = {
            "center": "2"
        }
        window.webkit.messageHandlers.center.postMessage(json);
    })
</script>
<!-- 加载弹出层 -->
<div class="mask-layer-loading">
    <img src="static/picture/mask_load.gif" />
</div>
</body>
</html>
