<?php

namespace app\modules\v1\forms\auth;


use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminGroupAuth;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\auth\AuthService;
use app\modules\v1\utils\ApiException;

class SyncGroupAuthForm extends CommonForm
{




    public function run(){

        AuthService::sync();
        return "";
    }


}