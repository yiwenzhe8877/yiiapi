<?php

namespace app\modules\v1\forms\admin\user;


use app\componments\sql\SqlGet;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

class GetListForm extends CommonForm
{
    public $pageNum;




    public function run($form){


        $obj=new SqlGet();
        $obj->setTableName('admin_user');
        $obj->setOrderBy('user_id desc');
        $obj->setPageNum($form->pageNum);
        return        $obj->get_list();

    }

}