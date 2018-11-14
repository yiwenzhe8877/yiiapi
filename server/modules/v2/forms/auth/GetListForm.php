<?php

namespace app\modules\v1\forms\auth;


use app\models\AdminUser;
use app\modules\v1\service\sql\sqlService;
use app\modules\v1\utils\CodeMsgMap;

use app\modules\v1\utils\Filter;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class GetListForm extends CommonForm
{
    public $pageNum;







    public function run(){


        return sqlService::get_list_by_page('*','tk_admin_auth',[],'auth_id desc');

    }

}