<?php
/**
 * 文件名：WeChatSignModel.class.php
 * 作者: Min
 * 日期时间: 2016-09-09  0:27
 * 描述：
 */

namespace Home\Model;

use Think\Model\ViewModel;

class WeChatSignViewModel extends ViewModel {

	
	public $viewFields = array(    
	'WeChatSign'=>array(
		'_table' => 'TB_WeChatSign',
		'id',
		'openId',
		'result',
		'signTime',
		
	),   
	'WeChatUserInfo'=>array(
		'_table' =>'TB_WeChatUserInfo',
		'nickName',
		'_on'=> 'WeChatSign.openId=WeChatUserInfo.openid',
		
	),
	'WeChatBind'=>array(
		'_table' =>'TB_WeChatBind',
		'userId',
		'_on'=>'WeChatSign.openId=WeChatBind.OpenId',
	),
	'v_User'=>array(
        '_table' =>'v_sys_User',
        'userName',
		'_on'=>'WeChatBind.userId=v_User.id',
    ),
			
	);
	
	public function getData($openId){
		return $this->where("WeChatSign.openId='%s'", $openId)->order("signtime desc")->limit(5)->select();
	}
	
}