<?php

namespace app\modules\v1\forms\order\selllogs;



use app\componments\sql\SqlGet;
use app\modules\v1\forms\CommonForm;


class GetAllForm extends CommonForm
{
    public function addRule(){
        return [
        ];
    }

    public function run(){


        $obj=new SqlGet();
        $obj->setTableName('order_selllogs');
        $obj->setOrderBy('log_id desc');
        $obj->setWhere( ['is_enabled='=>1]);

        return $obj->get_all();
    }

}