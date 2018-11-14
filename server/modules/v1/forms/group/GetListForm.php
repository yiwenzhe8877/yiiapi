<?php

namespace app\modules\v1\forms\group;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;
use app\modules\v1\utils\CodeMsgMap;
use app\modules\v1\utils\Filter;

class GetListForm extends CommonForm
{
    public $pageNum;



    public function run(){


        return sqlService::get_list_by_page('*','tk_admin_group',[],'group_id desc');

    }

}