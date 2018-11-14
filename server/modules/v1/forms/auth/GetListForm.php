<?php

namespace app\modules\v1\forms\auth;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

class GetListForm extends CommonForm
{
    public $pageNum;







    public function run(){


        return sqlService::get_list_by_page('*','tk_admin_auth',[],'auth_id desc');

    }

}