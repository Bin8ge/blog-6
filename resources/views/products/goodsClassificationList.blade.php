
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
			var APPMAIN = 'http://tp.23673.com/wap';
			var ADMINMAIN = 'http://tp.23673.com/admin';

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
					$("#buttom_home").find("img").attr("src", "/template/wap/default/public/images/home_check.png");
				} else if (event == "#buttom_classify") {
					$("#buttom_classify").find("img").attr("src", "/template/wap/default/public/images/classify_check.png");
				} else if (event == "#buttom_stroe") {
					$("#buttom_stroe").find("img").attr("src", "/template/wap/default/public/images/store_check.png");
				} else if (event == "#bottom_cart") {
					$("#bottom_cart").find("img").attr("src", "/template/wap/default/public/images/cart_check.png");
				} else if (event == "#bottom_member") {
					$("#bottom_member").find("img").attr("src", "/template/wap/default/public/images/user_check.png");
				}
			}
			function clearButton() {
				$("#buttom_home").find("img").attr("src", "/template/wap/default/public/images/home_uncheck.png");
				$("#buttom_classify").find("img").attr("src", "/template/wap/default/public/images/classify_uncheck.png");
				$("#buttom_stroe").find("img").attr("src", "/template/wap/default/public/images/store_uncheck.png");
				$("#bottom_cart").find("img").attr("src", "/template/wap/default/public/images/cart_uncheck.png");
				$("#bottom_member").find("img").attr("src", "/template/wap/default/public/images/user_uncheck.png");
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

		<link rel="stylesheet" type="text/css" href="static/css/components.css">
		<link rel="stylesheet" type="text/css" href="static/css/group_goods_list.css">
		<style>
			.custom-search-button {
				top: 6px;
			}
			.category {
				width: 95%;
				margin: 10px auto;
				display: none;
			}
			.category img {
				display: inline-block;
				width: 100%;
			}
			.nothing-data {
				margin-top: 50%;
			}
			.custom-tag-list-goods dl {
				width: 100%;
			}
			.custom-tag-list-goods dt a {
				padding: 0 10px;
			}
			.custom-tag-list {
				height: 92%;
			}
		</style>
	</head>
	<body class="body-gray">
	<section class="head">
		<a class="head_back" id="head_back" href="http://tp.23673.com/wap"><i class="icon-back"></i></a>
		<div class="head-title">商品分类</div>
	</section>
	<div class="motify" style="display: none;">
		<div class="motify-inner">弹出框提示</div>
	</div>
	<!-- 平台商品分类 -->
	<!-- 搜索框样式 -->
	<div class="custom-tag-list clearfix">
		<div class="custom-tag-list-menu-block">
			<ul class="custom-tag-list-side-menu" style="position: relative;width:100%;background:#fff;" id='goods_group'>
        @foreach($parent as $value)
				<li val="{{$value["id"]}}">
					<a class="selected" onclick="showCategorySecond(this,{{$value["id"]}})" data-category-id="{{$value["id"]}}"><span>{{$value["name"]}}</span></a>
				</li>
        @endforeach
			</ul>
		</div>
		<div class="custom-tag-list-goods" id='good_list'>
			<!-- 一级分类频道 -->
      @foreach($parent as $value)
			<div class="category js-category-{{$value["id"]}}" style="display:block;">
				<div style="width:100%;background: #ffffff;text-align: center;">
					<img src="static/picture/1500620933.jpg" alt="{{$value["name"]}}">
				</div>
				<a href="http://tp.23673.com/wap/goods/goodslist?category_id={{$value["id"]}}" class="all" style="color: #FFF">进入{{$value["name"]}}频道&nbsp;&gt;&nbsp;&gt;</a>
			</div>
      @endforeach
      @foreach($categoryTree as $values)
			<dl class="js-category-{{$values["id"]}}">
          @foreach($values["children"] as $value)
				<dt>
        <a href="http://tp.23673.com/wap/goods/goodslist?category_id={{$value["id"]}}"> {{$value["name"]}}
				</a>
        </dt>
				<dd>
					<div class="catalog-box">
            @foreach($value["children"] as $item)
						<div class="catalog-info">
							<a href="http://tp.23673.com/wap/goods/goodslist?category_id={{$item["id"]}}">
								<div style=" height:40px; width: 100%;overflow: hidden;">
									<img src="static/picture/catagory-02.png" alt="{{$item["name"]}}" />
								</div>
								<em style="margin:0;">{{$item["name"]}}</em>
							</a>
						</div>
          @endforeach
					</div>
				</dd>
        @endforeach
			</dl>
      @endforeach
			<div class="nothing-data js-children" align="center" style="display:none;">
				<img src="static/picture/wap_nodata.png" />
				<div>当前商品分类下没有子分类...</div>
			</div>
		</div>
	</div>
	<div style="position: fixed;bottom: 5%;right: 5%;width: 50px;z-index: 999;" onclick="location.href='http://tp.23673.com/wap';">
		<img src="static/picture/go_home.png" style="width: 100%;max-width: 100%;" />
	</div>
	<script>
		$(function() {
			//默认显示选择的第一个商品分类数据
			if ($("#goods_group li .selected").attr("data-category-id") != undefined) {
				showCategorySecond($("#goods_group li .selected"), $("#goods_group li .selected").attr("data-category-id"));
			}

			//将没有第三级的商品分类过滤
			$("[class*='js-category']").each(function() {
				if ($(this).find(".catalog-info").length == 0) {
					$(this).find("dd").remove();
				}
			});
		});
		//显示二级分类
		function showCategorySecond(obj, category_id) {
			//设置选中效果
			$(".custom-tag-list-side-menu li a").removeClass("selected");
			$(obj).addClass("selected");
			$("[class*='js-category']").hide();
			$("[class$='js-category-" + category_id + "']").show();
			if ($("dl[class='js-category-" + category_id + "']").length == 0) {
				$(".js-children").show();
			} else {
				$(".js-children").hide();
			}
		}
	</script>
	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="static/picture/mask_load.gif" />
	</div>

</body>
</html>
