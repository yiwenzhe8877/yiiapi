<?php

namespace app\modules\v3\forms\member\money;



use app\componments\sql\SqlGet;
use app\componments\common\CommonForm;


class GetAllForm extends CommonForm
{
    public function addRule(){
        return [
        ];
    }

    public function run(){


        $obj=new SqlGet();
        $obj->setTableName('member_money');
        $obj->setOrderBy('logid desc');
        $obj->setWhere( ['is_enabled='=>1]);

        return $obj->get_all();
    }

}