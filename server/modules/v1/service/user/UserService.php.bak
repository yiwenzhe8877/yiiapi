<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/2
 * Time: 15:38
 */
namespace app\modules\v1\service\user;

use app\models\AdminUser;
use app\modules\v1\utils\ApiException;

class UserService
{
    public static function getAdminUser(){
        $request=\Yii::$app->getRequest();

        $accessToken=$request->headers['token'];

        if(!$accessToken){
            $accessToken = $request->get('token');
        }


        $data=AdminUser::find()->andWhere(['=','auth_key',$accessToken])->one();


        if(!$data){
            ApiException::run("token不存在或错误",'300001',__CLASS__,__METHOD__,__LINE__);
        }

        return $data;

    }
}