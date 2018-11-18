<?php

namespace app\modules\v1\forms\admin\user;

use app\componments\sql\SqlUpdate;
use app\modules\v1\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $id;



    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('member_base');
        $obj->setData($form);
        $obj->setWhere(['member_id='=>$form->member_id]);
        return $obj->run();

    }

}