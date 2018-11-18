<?php

namespace app\modules\v1\forms\admin\user;


use app\models\api\admin\user\GetAdminUserApi;
use app\modules\v1\forms\CommonForm;

class GetOneForm extends CommonForm
{
    public $id;



    public function run($form){
        return GetAdminUserApi::getById($form->id);
    }

}