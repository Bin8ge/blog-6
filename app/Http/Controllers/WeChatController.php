<?php

namespace App\Http\Controllers;

use App\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use EasyWeChat\Factory;

class WeChatController extends Controller
{
    //微信授权登录代码
    public function auth(Request $request)
    {
        //通过session获取用户授权信息
        $WeChatUserInfo = session('wechat.oauth_user.default');

        //查询并判断微信用户是否已在并平台进行注册
        $UserInfo = User::where('openid',$WeChatUserInfo['id'])->first();
        if (!$UserInfo) {
            //用户的密码需要他在第一次登录的时候进行设置
            //手机号码需要进行绑定,需要根据用户id来进行异构索引表分表
            $result = User::create([
                //'id' => $this->uuid(),
                'Openid' => $WeChatUserInfo['id'],
                'username' => $WeChatUserInfo['name'],
                'role_id' => 1,//角色默认1位普通用户
                'vender_type' => 2,
                'status' => 0,
                'login_ip' => $request->getClientIp()
            ]);
        }else{
            $result = $UserInfo;
        }

        //登录验证
        Auth::login($result,true);

        $redirect_url = $request->redirect_url;
        if ($redirect_url == '') {
            // code...
            return \redirect('/index');
        }else{
            return \redirect($redirect_url);
        }
    }

    public function uuid($prefix='')
    {
        // code...
        $str = md5(uniqid(mt_rand(), true));
        $uuid  = substr($str,0,8) . '-';
        $uuid .= substr($str,8,4) . '-';
        $uuid .= substr($str,12,4) . '-';
        $uuid .= substr($str,16,4) . '-';
        $uuid .= substr($str,20,12);
        return $prefix . $uuid;
    }
}
