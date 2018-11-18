<?php

namespace app\modules\v2\forms\member;


use app\componments\utils\ApiException;
use app\models\user;
use app\modules\v2\forms\CommonForm;
use app\modules\v2\service\user\UserService;

class LogoutForm extends CommonForm
{


    public function run(){


        $user=UserService::getAdminUser();

        
        if(!$user){
            ApiException::run("token不存在或错误",'900001');
        }

        if(!YII_DEBUG){

            $model=user::find()->andWhere(['=','username',$user->username])->one();

            $model->auth_key=getRandom();
            $model->save();
        }

        return "";
    }

}