<?php

namespace app\modules\v1\forms\member\base;



use app\componments\sql\SqlGet;
use app\models\api\member\base\ChangePasswordApi;
use app\modules\v1\forms\CommonForm;


class ChangePasswordForm extends CommonForm
{
    public $password;
    public $passwordagain;
    public $member_id;

    public function addRule(){
        return [
            [['password','passwordagain','member_id'],'required','message'=>'{attribute}不能为空'],

            [['member_id'], 'exist','targetClass' => 'app\models\MemberBase', 'message' => '用户不存在'],
        ];
    }

    public function run($form){

        $obj=new ChangePasswordApi();
        $obj->setMemberId($form->member_id);
        $obj->setPassword($form->password);
        $obj->setPasswordagain($form->passwordagain);
        $obj->changePwd();
        return "";
    }

}