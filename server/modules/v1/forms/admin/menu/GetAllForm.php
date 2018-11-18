<?php

namespace app\modules\v1\forms\admin\menu;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;


class GetAllForm extends CommonForm
{




    public function run(){



        return sqlService::get_all('*','tk_admin_menu',[],'sort desc');

    }

}