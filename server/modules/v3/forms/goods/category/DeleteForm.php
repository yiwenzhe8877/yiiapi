<?php

namespace app\modules\v2\forms\goods\category;

use app\componments\sql\SqlUpdate;
use app\modules\v2\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $classid;

    public function addRule(){
        return [
            [['classid'], 'exist','targetClass' => 'app\models\goods\category', 'message' => '{attribute}不存在'],
        ];
    }

    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('goods_category');
        $obj->setData(['del'=>1]);
        $obj->setWhere(['classid='=>$form->classid]);
        return $obj->run();

    }

}