<?php

namespace app\modules\v1\forms\member\base;



use app\componments\sql\SqlGet;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

class GetListForm extends CommonForm
{



    public function run($form){

        $obj=new SqlGet();
        $obj->setTableName('member_base');
        $obj->setOrderBy('member_id desc');
        $obj->setPageNum($form->pageNum);
        return $obj->get_list();
    }

}