<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeChateController extends Controller
{
    public function wxcode()
    {

        $param = http_build_query([
            'appid' => 'wx87c94eea5dfc0cb8',
            'redirect_uri' => 'http://lms-blog.com/wxtoken',
            'response_type' => 'code',
            'scope' => 'snsapi_userinfo',
        ]);

        $redirect_uri = 'https://open.weixin.qq.com/connect/oauth2/authorize?' . $param . '#wechat_redirect';

        return redirect($redirect_uri);

    }


    public function wxtoken(Request $resquest)
    {
        $param = http_build_query([
            'appid' => 'wx87c94eea5dfc0cb8',
            'secret' => '9cac8cdd561926d5122dca2dbf584e77',
            'code' => $resquest->input('code'),
            'grant_type' => 'authorization_code',
        ]);

        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?' . $param;
        $result = file_get_contents($url);
        $access_token = json_decode($result);

        $params = http_build_query([
            'access_token' => $access_token->access_token,
            'openid' => $access_token->openid,
            'lang' => 'zh_CN' ,
        ]);

        $userInfo = "https://api.weixin.qq.com/sns/userinfo?".$params;
        $UserInfo = json_decode(file_get_contents($userInfo));
        dd($UserInfo);

    }

}
