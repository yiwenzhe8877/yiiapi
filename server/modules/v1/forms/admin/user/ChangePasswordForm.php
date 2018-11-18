<?php


namespace app\modules\v1\forms\admin\user;

use app\componments\utils\ApiException;
use app\componments\utils\Assert;
use app\models\admin\user;
use app\modules\v1\forms\CommonForm;

class ChangePasswordForm extends CommonForm
{

    public $user_id;
    public $password;
    public $passwordagain;




    public function addRule(){
        return [

            ['user_id','required','message'=>'用户id不能为空'],
            ['password','required','message'=>'密码不能为空'],
            [['user_id'], 'exist','targetClass' => 'app\models\admin\user', 'message' => '用户不存在'],
            ['passwordagain','required','message'=>'再次密码不能为空'],
        ];
    }


    public function run($form){


        Assert::PasswordNotEqual($form->password,$form->passwordagain);
        Assert::PwdNotStrong($form->password);


        $model=user::findOne($form->user_id);

        $model->password=md5($form->password.\Yii::$app->params['salt']);

      //  $model->save();
        return "";
    }


}