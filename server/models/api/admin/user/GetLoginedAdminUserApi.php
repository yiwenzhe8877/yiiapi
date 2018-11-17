<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/17
 * Time: 17:44
 */
namespace app\models\api\admin\user;

use app\componments\auth\QueryParamAuthBackEnd;
use app\models\AdminUser;

class GetLoginedAdminUserApi
{
    //取消所有的默认
    public static function getUid(){
     return   AdminUser::findOne(['auth_key'=>QueryParamAuthBackEnd::getAdminToken()])->user_id;
    }
    public static function getName(){
        return   AdminUser::findOne(['auth_key'=>QueryParamAuthBackEnd::getAdminToken()])->username;
    }
}