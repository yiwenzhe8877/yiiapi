<?php

namespace app\modules\v1\forms\user;


use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\utils\ApiException;

class ChangePasswordForm extends CommonForm
{

    public $user_id;
    public $password;
    public $passwordagain;




    public function addRule(){
        return [

            ['user_id','required','message'=>'用户id不能为空'],
            ['password','required','message'=>'密码不能为空'],
            ['passwordagain','required','message'=>'再次密码不能为空'],
        ];
    }


    public function run($form){
        $model=AdminUser::findOne($form->user_id);

        if(!$model){
            ApiException::run("用户id不存在",'900001');
        }

        if($form->password!==$form->passwordagain){
            ApiException::run("两次输入的密码不一致",'900001');
        }




        $model=AdminUser::findOne($form->user_id);

        $model->password=md5($form->password.\Yii::$app->params['salt']);

        $model->save();
        return "";
    }


}