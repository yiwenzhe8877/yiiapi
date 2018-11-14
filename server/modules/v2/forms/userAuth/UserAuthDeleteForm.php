<?php

namespace app\modules\v1\forms\userAuth;


use app\models\AdminAuth;
use app\models\AdminUser;
use app\models\AdminUserGroup;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class UserAuthDeleteForm extends CommonForm
{
    public $auth_id;



    public function rules()
    {
        return [
            ['auth_id','required','message'=>'id不能为空'],
            ['auth_id', 'exist','targetClass' => '\app\models\AdminAuth', 'message' => '权限id不存在'],

        ];
    }


    public function delete(){

        AdminAuth::deleteAll(['auth_id'=>$this->auth_id]);

    }

}