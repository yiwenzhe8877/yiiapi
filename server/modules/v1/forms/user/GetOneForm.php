<?php

namespace app\modules\v1\forms\user;


use app\componments\utils\ApiException;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;

class GetOneForm extends CommonForm
{
    public $id;





    public function run($form){
        $user= AdminUser::findOne($form->id);
        if(!$user){
            ApiException::run("用户不存在",'9000001');

        }
        return $user;
    }

}