<?php

namespace app\modules\v1\forms\user;


use app\models\AdminUser;
use app\modules\v1\service\user\UserService;
use app\modules\v1\utils\ApiException;
use app\modules\v1\utils\CodeMsgMap;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class GetOneForm extends CommonForm
{
    public $id;



    public function rules()
    {
        $result=parent::getRules(FORM_CLASS);


        return array_merge($result,$this->addRule());
    }

    public function addRule(){
        return [
        ];
    }



    public function run($form){
        $user= AdminUser::findOne($form->id);
        if(!$user){
            ApiException::run("用户不存在",'9000001');

        }
        return $user;
    }

}