<?php

namespace app\modules\v1\forms\group;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

class GetAllForm extends CommonForm
{






    public function run(){


        return sqlService::get_all('*','tk_admin_group',[],'group_id desc');

    }

}