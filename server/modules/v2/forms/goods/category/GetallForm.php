<?php

namespace app\modules\v2\forms\goods\category;



use app\componments\sql\SqlGet;
use app\modules\v2\forms\CommonForm;


class GetAllForm extends CommonForm
{
    public function addRule(){
        return [
        ];
    }

    public function run($form){

        $obj=new SqlGet();
        $obj->setTableName('goods_category');
        $obj->setOrderBy('sort desc');
        $obj->setWhere( ['upid'=>$form->upid]);
        
        return $obj->get_all();
    }

}