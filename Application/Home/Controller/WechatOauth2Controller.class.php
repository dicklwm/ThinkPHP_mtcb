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
        $data = U("WechatOauth2/Oauth2", array('url' => "WechatOauth2/Bind", 'userId' => $userId), '', true, true);
//        $data = "http://www.mitarl.com/mtcb/Home/WechatOauth2/link?userId=$userId";
        // 纠错级别：L、M、Q、H
        $level = 'L';
        // 点的大小：1到10,用于手机端4就可以了
        $size = 5;
        $object = new \QRcode();
        $object->png($data, false, $level, $size);

    }

    public function Oauth2() {
//        $REDIRECT_URI = urlencode("http://www.mitarl.com/mtcb/Home/WechatOauth2/Oauth2");

        if (I('userId') != "") {
            $REDIRECT_URI = urlencode(U(I('url'), array("userId" => I('userId')), '', true, true));
        } else {
            $REDIRECT_URI = urlencode(U(I('url'), '', true, true));
        }

        $appID = C('appID');

        $API_URL = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appID&redirect_uri=$REDIRECT_URI&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";

        header("Location:" . $API_URL);
    }


    public function Bind() {
        $code = I('code');
        $userId = I('userId');
        $appID = C('appID');
        $appsecret = C('appsecret');
        if ($code != '' && $appID != '' && $appsecret != '') {
            // 获取个人信息
            $userinfo = getWeChatUserInfo($code, $appID, $appsecret);

            $StringUtil = new \Org\Util\String();
            $userinfo['id'] = $StringUtil->uuid();
            $userinfo['systemTime'] = date("Y-m-d H:i:s");

            $TB_WeChatUserInfo = D('WeChatUserInfo');
            $TB_WeChatBind = D('WeChatBind');

            $TB_WeChatUserInfo->data($userinfo)->add();


            $TB_WeChatBind_data = array('id' => $StringUtil->uuid(), 'OpenId' => $userinfo['openid'], 'userId' => $userId, 'systemTime' => date("Y-m-d H:i:s"));

            $TB_WeChatBind->data($TB_WeChatBind_data)->add();

            //echo json_encode($userinfo);
            $this->success('绑定成功，请在系统中刷新数据', 'about:blank', 5);
        } else {
            $this->error('绑定失败，请检查数据');
        }
    }
}