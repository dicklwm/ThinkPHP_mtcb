<?php
/**
 * 文件名：UserViewModel.class.php
 * 作者: Min
 * 日期时间: 2016/8/5  13:33
 * 描述：用户的模型
 */

namespace Home\Model;

use Think\Model\ViewModel;

class UserViewModel  extends ViewModel{
    //主表的表名【用户表】

    public $viewFields = array(
        //用户模型
        'v_User'=>array(
            '_table' =>'v_sys_User',
            'id',
            'userName',
            'userNo',
            ),
        //用户与账号关联模型
        'v_User_Account'=>array(
            '_table' =>'v_sys_User_Account',
            '_on'=>'v_User.id = v_User_Account.userId'
        ),
        //账号的模型
        'v_Account'=>array(
            '_table'=>'v_sys_Account',
            'account',
            'pwd',
            '_on'=>'v_User_Account.AccountId = v_Account.id'
        ),
        //用户与机构关联模型
        'v_Org_User'=>array(
          '_table'=>'v_sys_Belongs_Org_User',
            '_on'=>'v_User.id = v_Org_User.userId',
        ),
        //机构模型
        'v_Org'=>array(
          '_table'=>'v_sys_Org',
            '_on'=>'v_Org.id = v_Org_User.orgId',
            'id'=>'orgId',
            'orgNo',
            'orgName',
            'address'=>'orgAddress',
            'telephone'=>'orgTel',
            'fax'=>'orgFax',
            'deptTypeNo'=>'orgType',
            'postCode'=>'orgPostCode',
            'email'=>'orgEmail',
        ),
        /*
        //岗位与用户的关联模型
        'v_Post_User'=>array(
          '_table'=>'v_sys_Post_User',
            '_on'=>'v_User.id = v_Post_User.userId',
            '_type'=>'LEFT',
        ),
        //岗位模型
        'v_Post'=>array(
            '_table'=>'v_sys_Post',
            '_on'=>'v_Post.id = v_Post_User.postId and v_Post.postType != \'hidden\'',

            'id'=>'postId',
            'postName',
            'postType',
        ),
        */

    );

}