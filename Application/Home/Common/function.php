<?php
/**
 * 文件名：function.php
 * 作者: Min
 * 日期时间: 2016/8/1  16:37
 * 描述：
 */

function p ($array){
    dump($array,1,'<pre>',0);
}
/*
 * get 方法
 */
function get($url, $param=array()){
    if(!is_array($param)){
        throw new Exception("参数必须为array");
    }
    $p='';
    foreach($param as $key => $value){
        $p=$p.$key.'='.$value.'&';
    }
    if(preg_match('/\?[\d\D]+/',$url)){//matched ?c
        $p='&'.$p;
    }else if(preg_match('/\?$/',$url)){//matched ?$
        $p=$p;
    }else{
        $p='?'.$p;
    }
    $p=preg_replace('/&$/','',$p);
    $url=$url.$p;
    //echo $url;
    $httph =curl_init($url);
    curl_setopt($httph, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($httph, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($httph,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($httph, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");

    curl_setopt($httph, CURLOPT_HEADER,0);
    curl_setopt($httph,CURLOPT_CONNECTTIMEOUT,3);
//    curl_setopt($httph,CURLOPT_CONNECTTIMEOUT_MS,3);
    $rst=curl_exec($httph);
    curl_close($httph);
    return $rst;
}
/*
 * post方法
 */
function post($url, $param=array()){
    if(!is_array($param)){
        throw new Exception("参数必须为array");
    }
    $httph =curl_init($url);
    curl_setopt($httph, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($httph, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($httph,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($httph, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");
    curl_setopt($httph, CURLOPT_POST, 1);//设置为POST方式
    curl_setopt($httph, CURLOPT_POSTFIELDS, $param);
    curl_setopt($httph, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($httph, CURLOPT_HEADER,1);
    $rst=curl_exec($httph);
    curl_close($httph);
    return $rst;
}

/**
 * 网络请求
 * @param $url
 * @param null $data
 * @return mixed
 */
function https_request($url, $data = NULL) {
    $curl = curl_init ();
    curl_setopt ( $curl, CURLOPT_URL, $url );
    curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
    curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, FALSE );
    if (! empty ( $data )) {
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
    }
    curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
    $output = curl_exec ( $curl );
    curl_close ( $curl );
    return $output;
}

/**
 * 授权获取微信信息
 * @param $code
 * @param $appID
 * @param $appsecret
 * @return mixed
 */
function getWeChatUserInfo($code, $appID, $appsecret) {
    // 根据code获取access_token
    $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appID&secret=$appsecret&code=$code&grant_type=authorization_code";
    $access_token_json = https_request ( $access_token_url );
    // json解码为PHP的数组
    $access_token_array = json_decode ( $access_token_json, true );
    // 获取到access_token
    $access_token = $access_token_array ['access_token'];
    // 获取到用户的openid
    $openid = $access_token_array ['openid'];
    // 根据access_token和openid获取用户信息
    $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
    $userinfo_json = https_request ( $userinfo_url );
    // 根据获取回来的json编码为PHP的数组
    $userinfo_array = json_decode ( $userinfo_json, true );
    // 返回数组类型的用户信息
    return $userinfo_array;
}

//JsApiTicket和access_token的缓存文件的写入和读取
function get_php_file($filename) {
    return trim(substr(file_get_contents(DATA_PATH.$filename), 15));
}
function set_php_file($filename, $content) {
    $fp = fopen(DATA_PATH.$filename, "w");
    fwrite($fp, "<?php exit();?>" . $content);
    fclose($fp);
}



?>