<?php

namespace app\modules\v1\forms\admin\user;

use app\componments\utils\ApiException;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\user\UserService;

class LogoutForm extends CommonForm
{


    public function run(){


        $user=UserService::getAdminUser();

        
        if(!$user){
            ApiException::run("token不存在或错误",'900001');
        }

        if(!YII_DEBUG){

            $model=AdminUser::find()->andWhere(['=','username',$user->username])->one();

            $model->auth_key=getRandom();
            $model->save();
        }

        return "";
    }

}