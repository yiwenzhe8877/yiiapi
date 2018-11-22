<?php

namespace app\modules\v2\forms\member;


use app\componments\utils\ApiException;
use app\componments\utils\ValidateUtils;
use app\modules\v2\forms\CommonForm;

class RegisterForm extends CommonForm
{

    public $pam_phone;
    public $verify_code;
    public $source;



    public function addRule(){
        return [
            ['pam_phone','required','message'=>'手机号不能为空'],
            ['pam_phone','match','pattern'=>'/^1[34578]\d{9}$/','message'=>'手机号格式错误'],
            ['pam_phone', 'unique','targetClass' => '\app\models\MemberBase', 'message' => '手机号已经存在'],
            [['pam_phone'],'checkphone','skipOnEmpty' => false, 'skipOnError' => false,'params'=>['wrong'=>"手机号格式错误"]],

        ];
    }

	
    public function run($form){
        return 123123;
		
    }


}