<?php

namespace app\modules\v1\forms\goods\category;



use app\componments\sql\SqlGet;
use app\modules\v1\forms\CommonForm;

class GetAllForm extends CommonForm
{



    public function run($form){


        $obj=new SqlGet();
        $obj->setTableName('goods_class');
        $obj->setOrderBy('displayorder desc');
        $obj->setWhere(['upid='=>$form->pid]);
        return $obj->get_all();
    }

}