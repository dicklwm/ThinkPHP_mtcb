<?php
/**
 * 文件名：JsSdkController.class.php
 * 作者: Min
 * 日期时间: 2016-09-08  20:59
 * 描述：
 */

namespace Home\Controller;

use Think\Controller;

class JsSdkController extends Controller {


    private $openId;

    //构造器
    //public function __construct($appId, $appSecret) {
    //    $this->appId = $appId;
    //    $this->appSecret = $appSecret;
    //}

    public function index() {
        //获取配置

        $code = I('code');
        if ($code != '' && C('appID') != '' && C('appsecret') != '') {

            // 获取个人信息
            $userinfo = getWeChatUserInfo($code, C('appID'), C('appsecret'));
            $openId = $userinfo['openid'];
            //$openId = "olFkMv_Mh6caNpS1sFOWexH5JRLo";
            $signPackage = $this->GetSignPackage();
            $nowdate = date("Y-m-d H:i:s");

            if ($openId == "")
                $this->error("请重新登录");
            else {

                $needSign = "";
                $Sign = D('WeChatSignView')->getData($openId);

                if (count($Sign) != 0) {
                    //判断今日是否需要签到
                    if (date_format(date_create($Sign[0]['signTime']), "Y-m-d") == date('Y-m-d'))
                        if ($Sign[0]['result'] == 1)
                            $needSign = "disabled";
                }

                $this->assign("signPackage", $signPackage);
                $this->assign("sign", $Sign);
                $this->assign("openId", $openId);
                $this->assign("needSign", $needSign);
                $this->display();

            }
        } else {
            $this->error("code获取数据失败，code=$code");
        }
    }


    public function test() {
//        $d = date("Y-m-d H:i:s");
//        $da =date_create($d);
//        echo date_format($da,"Y-m-d");
    }

    //签到接口
    public function Sign() {
        $res = json_decode($_POST['res']);
        $openId = $_POST['openId'];
        //$res_s = '{"latitude":23.129163,"longitude":113.264435,"errMsg":"getLocation:ok"}';
        //$res = json_decode($res_s);
        $place = D('WeChatSignPlace')->where('isUse=1')->select();
        $StringUtil = new \Org\Util\String();
        $array = array(
            "id" => $StringUtil->uuid(),
            "openId" => $openId,
            "signTime" => date("Y-m-d H:i:s"),
            "lng" => $res->longitude,
            "lat" => $res->latitude,
            "speed" => $res->speed,
            "accuracy" => $res->accuracy,
        );
        if ($array['openId'] != "") {
            if (count($place) == 1) {
                $Min_lng = $place[0]['lng'] - $place[0]['lngDeviation'];
                $Max_lng = $place[0]['lng'] + $place[0]['lngDeviation'];
                $Min_lat = $place[0]['lat'] - $place[0]['latDeviation'];
                $Max_lat = $place[0]['lat'] + $place[0]['latDeviation'];

                if ($res->longitude > $Min_lng && $res->longitude < $Max_lng)
                    if ($res->latitude > $Min_lat && $res->latitude < $Max_lat) {
                        //成功
                        $array['result'] = 1;

                    } else {
                        //经度失败
                        $array['result'] = 0;
                    }
                else {
                    //纬度失败
                    $array['result'] = 0;
                }
                //向数据库插入数据
                D('WeChatSign')->data($array)->add();
                //成功则返回正确的Json数据
                if ($array['result'] == 1)
                    echo json_encode(array("trueResult" => D('WeChatSignView')->getData($openId), "result" => 1));
                else
                    echo json_encode(array(
                        "result" => 0,
                        "errorMsg" => "签到失败，定位偏差超出系统设定，您的纬度：$res->latitude ，您的经度：$res->longitude ，系统纬度范围：$Min_lat - $Max_lat ，系统经度范围：$Min_lng - $Max_lng",
                        "latitude" => $res->latitude,
                        "longitude" => $res->longitude,
                        "trueResult" => D('WeChatSignView')->getData($openId),

                    ));
                //$this->error("签到失败，定位偏差超出系统设定，您的纬度：$res->latitude，您的经度：$res->longitude",'',8);

            } else {
                echo json_encode(array("result" => 0, "errorMsg" => "找不到签到地点，请先设置", "trueResult" => D('WeChatSignView')->where("WeChatSign.openId='%s'", $openId)->limit(5)->select()));
                //$this->error("找不到签到地点，请先设置",'',5);
            }
        } else {
            echo json_encode(array("result" => 0, "errorMsg" => "openId不存在，请重新登录"));
            //$this->error("openId不存在，请重新登录",'',5);
        }


    }

    //获取签名包，以下代码都是微信官方提供
    private function getSignPackage() {


        $jsapiTicket = $this->getJsApiTicket();

        // 注意 URL 一定要动态获取，不能 hardcode.
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appId" => C('appID'),
            "nonceStr" => $nonceStr,
            "timestamp" => $timestamp,
            "url" => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }

    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    private function getJsApiTicket() {
        // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = json_decode($this->get_php_file("jsapi_ticket.php"));
        if ($data->expire_time < time()) {
            $accessToken = $this->getAccessToken();
            // 如果是企业号用以下 URL 获取 ticket
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode(https_request($url));
            $ticket = $res->ticket;
            if ($ticket) {
                $data->expire_time = time() + 7000;
                $data->jsapi_ticket = $ticket;
                $this->set_php_file("jsapi_ticket.php", json_encode($data));
            }
        } else {
            $ticket = $data->jsapi_ticket;
        }

        return $ticket;
    }

    private function getAccessToken() {
        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = json_decode($this->get_php_file("access_token.php"));
        $appID = C('appID');
        $appsecret = C('appsecret');
        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appID&secret=$appsecret";
            $res = json_decode(https_request($url));
            $access_token = $res->access_token;
            if ($access_token) {
                $data->expire_time = time() + 7000;
                $data->access_token = $access_token;
                $this->set_php_file("access_token.php", json_encode($data));
            }
        } else {
            $access_token = $data->access_token;
        }
        return $access_token;
    }

    private function get_php_file($filename) {
        return trim(substr(file_get_contents(DATA_PATH . $filename), 15));
    }

    private function set_php_file($filename, $content) {
        $fp = fopen(DATA_PATH . $filename, "w");
        fwrite($fp, "<?php exit();?>" . $content);
        fclose($fp);
    }

}