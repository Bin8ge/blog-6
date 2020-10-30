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
	<link rel="stylesheet" type="text/css" href="static/css/control_type.css">
	<link rel="stylesheet" type="text/css" href="static/css/goods_list.css">
	<link rel="stylesheet" type="text/css" href="static/css/group_buy.css">
	<style type="text/css">
		.custom-search-button {
			top: 1px;
		}
		.sliding {
			overflow-y: auto;
			background: #ffffff;
		}
		.sliding::-webkit-scrollbar {
			display: none;
		}
		.sliding ul {
			white-space: nowrap;
			text-align: center;
		}
		.sliding ul li {
			padding: 10px 10px 0 10px;
			display: inline-block;
			background: #ffffff;
			border-right: 2px solid #f8f8f8;
			width: 25%;
		}
		.sliding ul li img {
			width: 60px;
			height: 60px;
		}
		.members_goodspic {
			border-bottom: 1px solid #f3f3f3;
		}
		.info p.goods-title {
			padding-top: 10px;
		}
		.info p.goods-price {
			margin: 0;
			margin-bottom: 8px;
		}
		.controltype {
			height: 35px;
			margin: 0;
			width: 100%;
			line-height: 32.5px;
		}
		.controltype>.control_l_content {
			top: 0;
			background: none;
		}
		.info p.goods-price>em {
			font-size: 12px;
			font-weight: bold;
			color: #f23030;
		}
		.popup {
			background: none;
			padding: 0;
		}
		.code {
			width: 60%;
			margin: 0 auto;
			background: #fff;
			border-radius: 13px;
		}
		.controltype>.control_l_content {
			width: 34%;
		}
		.members_goodspic>ul>li.gooditem>div.info {
			margin-top: 0px;
		}
		.com-content {
			min-height: 600px;
		}
	</style>
</head>
<body class="body-gray">
	<!-- 标识：是否显示顶部关注  0：[隐藏]，1：[显示]-->
	<!-- 遮罩层 -->
	<div class="shade" style="position:fixed;top:0px;left:0px;width:100%;height:100%;margin-top:0;background: rgba(0, 0, 0, 0.7);z-index: 999;display:none;"><span style="float: right; padding: 15px;font-size: 22px;color: #fff;background: transparent;"
		  id="close">X</span></div>
	<!-- 弹出层 -->
	<div class="popup" style="position:fixed;top: 36%;left: 0px;width: 100%;height: 100%;margin-left:0px;display:none;">
		<div class="code">
			<div style="overflow: hidden;">
				<img src="static/picture/1500630330.jpg" style="max-width: 100%;margin-top: 10px;" />
				<div style="color:#666; margin-bottom: 10px;">长按二维码关注公众微信</div>
			</div>
		</div>
	</div>
	<div class="motify" style="display: none;">
		<div class="motify-inner">弹出框提示</div>
	</div>
	<script language="javascript" src="static/js/jweixin-1.0.0.js"> </script>
	<input type="hidden" id="appId" value="">
	<input type="hidden" id="jsTimesTamp" value="">
	<input type="hidden" id="jsNonceStr" value="">
	<input type="hidden" id="jsSignature" value="">
	<div class="com-content">
		<!-- 搜索 -->
		<div style="width: 100%;background-color: #fff;padding: 10px 0px;">
			<script src="static/js/public_assembly.js"></script>
			<div class="editing">
				<div class="control-group">
					<div class="custom-search">
						<input type="text" name="search" class="custom-search-input" placeholder="搜索商品" style="background:#f4f4f4;border:none;border-radius:0;padding-right:10%;">
						<button type="button" class="custom-search-button">搜索</button>
						<input type="hidden" value="0" id="hidden_shop_id" />
					</div>
					<div class="component-border"></div>
				</div>
				<div class="sort">
					<i class="sort-handler"></i>
				</div>
			</div>
			<style>
				.custom-search-button {
					top: 0;
				}
			</style>
		</div>
		<!-- 轮播图 -->
		<link rel="stylesheet" type="text/css" href="static/css/slick.css">
		<link rel="stylesheet" type="text/css" href="static/css/components.css">
		<script src="static/js/slick.js"></script>
		<div class="slick">
			<div style="display:block;text-align:center;width:100%;height:175px;line-height:175px;">
				<a href="#">
					<img src="static/picture/1497070640.png" alt="" style="height:175px;max-width:100%;display: inline-block !important;vertical-align: middle !important;">
				</a>
			</div>
		</div>
		<script>
			$('.slick').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				autoplaySpeed: 2000,
			});
		</script>

		<!-- 公告 -->
		<link rel="stylesheet" type="text/css" href="static/css/limarquee.css">
		<script src="static/js/jquery.limarquee.js"></script>
		<style>
			.hot {
				width: 100%;
				height: 40px;
				background: #FFF;
				border-bottom: 1px solid #eee;
			}

			.hot .notice-img {
				float: left;
				width: 40px;
				height: 40px;
				margin: 2px 20px;
				position: relative;
			}

			.hot .notice-img img {
				display: block;
				height: 27px;
				width: 27px;
				margin:4px;
			}

			.hot .notice-img:after {
				content: '';
				display: block;
				width: 1px;
				height: 44px;
				background-color: #eee;
				position: absolute;
				right: -20px;
				top: 0;
			}

		</style>

		<div class="hot" style="position: relative; overflow: hidden;">
			<div class="notice-img">
				<a href="javascript:;"><img src="static/picture/ad.png"></a>
			</div>
			<div style="width:73%;overflow:hidden;font-size:12px;color: #666;">
				<div class="dowebok">
					&nbsp;&nbsp;&nbsp;&nbsp;手机端首页公告&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function() {
				$('.dowebok').liMarquee({
					hoverstop: false
				});
			});
		</script>

		<!-- 导航 -->
		<link rel="stylesheet" type="text/css" href="static/css/navi.css">
		<div class="navi">
			<div class="navi-item">
				<nav class="navi-item_row">
					<a href="http://tp.23673.com/wap">
						<span>
							<img src="static/picture/platform_nav_home1.png"><span>首页</span>
						</span>
					</a>
					<a href="http://tp.23673.com/wap/goods/integralcenter">
						<span>
							<img src="static/picture/platform_nav_category1.png"><span>积分中心</span>
						</span>
					</a>
					<a href="http://tp.23673.com/wap/index/discount">
						<span>
							<img src="static/picture/platform_nav_limit1.png"><span>限时折扣</span>
						</span>
					</a>
					<a href="http://tp.23673.com/wap/goods/brandlist">
						<span>
							<img src="static/picture/platform_nav_joins1.png"><span>品牌专区</span>
						</span>
					</a>
					<a href="http://tp.23673.com/wap/member/index">
						<span>
							<img src="static/picture/platform_nav_member1.png"><span>会员中心</span>
						</span>
					</a>

				</nav>
			</div>
		</div>

		<!-- 优惠券领取 -->

        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.index') }}" class="search-form">
                    <div class="form-row">
                        <input type="hidden" name="search" value="">
                        <div class="col-md-3">
                            <select name="order" class="form-control form-control-sm float-right">
                                <option value="">排序方式</option>
                                <option value="price_asc">价格从低到高</option>
                                <option value="price_desc">价格从高到低</option>
                                <option value="sold_count_desc">销量从高到低</option>
                                <option value="sold_count_asc">销量从低到高</option>
                                <option value="rating_desc">评价从高到低</option>
                                <option value="rating_asc">评价从低到高</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            var filters = {!! json_encode($filters) !!};
            $(document).ready(function () {
                $('.custom-search input[name=search]').val(filters.search);
                $('.search-form select[name=order]').val(filters.order);
                $('.search-form input[name=search]').val(filters.search);
                $('.search-form select[name=order]').on('change',function () {
                    $('.search-form').submit();
                })
            })
        </script>


		<div class="controltype">
			<img src="static/picture/hotsale.png" />
			<span class="control_l_content" style="color:#16D810;">清凉一夏</span>
			<!-- 		<img src="static/picture/top_selling.png"> -->
		</div>
		<section class="members_goodspic">
			<ul>
				@foreach($products as $product)
<li class="gooditem">
	<div class="imgs">
		<a href="{{ route('products.show',['product' => $product->id]) }}">
			<img class="lazy" src="{{ $product->image }}" style="max-width:100%;">
		</a>
	</div>
	<div class="info">
		<p class="goods-title">
			<a href="{{ route('products.show',['product' => $product->id]) }}">{{ $product->title }}</a></p>
		<p class="goods-price"><em>￥{{ $product->price }}</em></p>
		<a href="{{ route('products.show',['product' => $product->id]) }}"></a>
	</div>
</li>
@endforeach
			</ul>
		</section>
	</div>

	<style type="text/css">
    #pull_right{
        text-align:center;
    }
    .pull-right {
        /*float: left!important;*/
    }
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination > li {
        display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #428bca;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        color: #2a6496;
        background-color: #eee;
        border-color: #ddd;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #428bca;
        border-color: #428bca;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }
    .clear{
        clear: both;
    }
</style>
	{{$products->links()}}
	<div class="nav-pic">
		<!-- 	<p>手机版</p></a> -->
		<a href="http://tp.23673.com/index/index?default_client=shop" class="pc">
			<span><i></i></span>
			<p>返回电脑版</p>
		</a>
	</div>
	<div style="height:58px;"></div>
	<div class="fixed bottom">
		<div class="distribution-tip" id="distribution-tip" style="display: none;"></div>
		<dl class="sub-nav nav-b5">
			<dd id="buttom_home">
				<a href="{{route('products.index')}}">
					<div class="nav-b5-relative">
						<img src="static/picture/home_check.png" />
						<span>首页</span>
					</div>
				</a>
			</dd>
			<dd id="buttom_classify">
				<a href="Categories">
					<div class="nav-b5-relative">
						<img src="static/picture/classify_uncheck.png" />
						<span>分类</span>
					</div>
				</a>
			</dd>
			<dd id="buttom_stroe">
				<a href="http://tp.23673.com/wap/index/shopstreet">
					<div class="nav-b5-relative">
						<img src="static/picture/store_uncheck.png" />
						<span>店铺街</span>
					</div>
				</a>
			</dd>
			<dd id="bottom_cart">
				<a href="http://tp.23673.com/wap/goods/cart">
					<div class="nav-b5-relative">
						<img src="static/picture/cart_uncheck.png" />
						<span>购物车</span>
					</div>
				</a>
			</dd>
			<dd id="bottom_member">
				<a href="http://tp.23673.com/wap/Member/index">
					<div class="nav-b5-relative">
						<img src="static/picture/user_uncheck.png" />
						<span>会员中心</span>
					</div>
				</a>
			</dd>
		</dl>
	</div>
	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="static/picture/mask_load.gif" />
	</div>

	<script>
		$(function() {
			//关注微信公众号弹出
			$("#subscribe").click(function() {
				$(".shade").show();
				$(".popup").show();
			})
			//关注微信公众号关闭
			$("#close").click(function() {
				$(".shade").hide();
				$(".popup").hide();
			})
			$.ajax({
				type: "post",
				url: "http://tp.23673.com/wap/member/getShareContents",
				success: function(data) {
					wx.config({
						debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
						appId: $("#appId").val(), // 必填，公众号的唯一标识
						timestamp: $("#jsTimesTamp").val(), // 必填，生成签名的时间戳
						nonceStr: $("#jsNonceStr").val(), // 必填，生成签名的随机串
						signature: $("#jsSignature").val(), // 必填，签名，见附录1
						jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
					});

					wx.ready(function() {
						var title = data['share_title'];
						var share_contents = data['share_contents'] + '\r\n';
						var share_nick_name = data['share_nick_name'] + '\r\n';
						var desc2 = share_contents + share_nick_name + "收藏热度：★★★★★";
						var url = data['share_url'];
						var img_url = data['share_img'];
						wx.onMenuShareAppMessage({
							title: title,
							desc: desc2,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {},
							success: function(res) {
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {}
								});
							},
							cancel: function(res) {},
							fail: function(res) {}
						});
						// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
						wx.onMenuShareTimeline({
							title: title,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {	},
							success: function(res) {
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {}
								});
							},
							cancel: function(res) {},
							fail: function(res) {}
						});
						// 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
						wx.onMenuShareQQ({
							title: title,
							desc: desc2,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {},
							complete: function(res) {},
							success: function(res) {
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {}
								});
							},
							cancel: function(res) {},
							fail: function(res) {}
						});
						// 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
						wx.onMenuShareWeibo({
							title: title,
							desc: desc2,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {	},
							complete: function(res) {},
							success: function(res) {
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {}
								});
							},
							cancel: function(res) {},
							fail: function(res) {}
						});
					});
				}
			})
		})
	</script>

</body>

</html>
