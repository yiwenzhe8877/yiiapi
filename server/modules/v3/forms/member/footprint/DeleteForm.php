<?php

namespace app\modules\v3\forms\member\footprint;

use app\componments\sql\SqlUpdate;
use app\componments\common\CommonForm;

class DeleteForm extends CommonForm
{
    public $id;

    public function addRule(){
        return [
            [['id'],'required','message'=>'{attribute}不能为空'],
            [['id'], 'exist','targetClass' => 'app\models\member\footprint', 'message' => '{attribute}不存在'],
        ];
    }


    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('member_footprint');
        $obj->setWhere(['id='=>$form->id]);
        return $obj->run();

    }

}