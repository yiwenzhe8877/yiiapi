<?php

namespace app\modules\v1\forms\admin\group;


use app\models\api\admin\group\ForbidAdminGroupApi;
use app\modules\v1\forms\CommonForm;

class ForbiddenForm extends CommonForm
{
    public $id;


    public function run($form){

        return ForbidAdminGroupApi::forbid($form->id);
    }

}