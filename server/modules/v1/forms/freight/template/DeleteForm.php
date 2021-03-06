<?php

namespace app\modules\v1\forms\freight\template;

use app\componments\sql\SqlUpdate;
use app\modules\v1\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $id;



    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('freight_template');
        $obj->setData(['del'=>1]);
        $obj->setWhere(['member_id='=>$form->member_id]);
        return $obj->run();

    }

}