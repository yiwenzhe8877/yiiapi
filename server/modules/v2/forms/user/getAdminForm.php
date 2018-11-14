<?php

namespace app\modules\v1\forms\user;


use app\models\AdminUser;
use app\modules\v1\service\user\UserService;
use app\modules\v1\utils\CodeMsgMap;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class getAdminForm extends CommonForm
{





    public function run(){
        $admin=UserService::getAdminUser();

        return [$admin];

    }

}