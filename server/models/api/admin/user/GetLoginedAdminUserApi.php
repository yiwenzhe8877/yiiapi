<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/17
 * Time: 17:44
 */
namespace app\models\api\admin\user;

use app\componments\auth\QueryParamAuthBackEnd;
use app\models\admin\user;

class GetLoginedAdminUserApi
{
    //取消所有的默认
    public static function getUid(){
     return   user::findOne(['auth_key'=>QueryParamAuthBackEnd::getAdminToken()])->user_id;
    }
    public static function getName(){
        return   user::findOne(['auth_key'=>QueryParamAuthBackEnd::getAdminToken()])->username;
    }
    public static function getAllInfo(){
        return   user::findOne(['auth_key'=>QueryParamAuthBackEnd::getAdminToken()]);
    }

}