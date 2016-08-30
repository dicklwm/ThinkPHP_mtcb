<?php
/**
 * 文件名：WechatOauth2Controller.class.php
 * 作者: Min
 * 日期时间: 2016-08-28  18:50
 * 描述：
 */

namespace Home\Controller;

use Think\Controller;

class WechatOauth2Controller extends Controller {

    public function index() {
        vendor('phpqrcode.phpqrcode');
        $userId = I('userId');
//        $data = U("WechatOauth2/link?userId=$userId",'',true,true);
        $data = "http://www.mitarl.com/mtcb/Home/WechatOauth2/link?userId=$userId";
        // 纠错级别：L、M、Q、H
        $level = 'L';
        // 点的大小：1到10,用于手机端4就可以了
        $size = 5;
        $object = new \QRcode();
        $object->png($data, false, $level, $size);

    }

    public function link() {
        $userId = I('userId');
        $REDIRECT_URI = urlencode("http://www.mitarl.com/mtcb/Home/WechatOauth2/Oauth2?userId=$userId");

        $appID = "wxc8793be48c555a1c";

        $API_URL = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appID&redirect_uri=$REDIRECT_URI&response_type=code&scope=snsapi_userinfo&state=STATE&userId=$userId#wechat_redirect";

        header("Location:" . $API_URL);
    }

    public function Oauth2() {
        $code = I('code');
        $userId = I('userId');
        $appID = "wxc8793be48c555a1c";
        $appsecret = "9dbcfc2dfcc9560c48139b6aa9a99878";
//        $appID = I('appID');
//        $appsecret = I('$appsecret');
        if ($code != '' && $appID != '' && $appsecret != '') {
            // 获取个人信息
            $userinfo = getWeChatUserInfo($code, $appID, $appsecret);
//            $userinfo['userId']=$userId;
            $StringUtil = new \Org\Util\String();
            $userinfo['id'] = $StringUtil->uuid();

            $TB_WeChatUserInfo = D('WeChatUserInfo');
            $TB_WeChatUserInfo->data($userinfo)->add();

            $TB_WeChatBind = D('TB_WeChatBind');
            $TB_WeChatBind->data(array('id' => $StringUtil->uuid(), 'OpenId' => $userinfo['openid'], 'userId' => $userId))->add();

            echo json_encode($userinfo);
        } else
            echo 'error';
    }
}