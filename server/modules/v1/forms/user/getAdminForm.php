<?php

namespace app\modules\v1\forms\user;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\user\UserService;

class getAdminForm extends CommonForm
{





    public function run(){
        $admin=UserService::getAdminUser();

        return [$admin];

    }

}