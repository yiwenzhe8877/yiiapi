<?php

namespace app\modules\v1\forms\user;


use app\models\AdminUser;
use app\modules\v1\service\user\UserService;
use app\modules\v1\utils\ApiException;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class LogoutForm extends CommonForm
{


    public function rules()
    {
        return [
        ];
    }


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