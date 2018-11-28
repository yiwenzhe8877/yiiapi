<?php

namespace app\modules\v2\forms\freight\template;

use app\componments\sql\SqlUpdate;
use app\modules\v2\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $ex_id;

    public function addRule(){
        return [
            [['ex_id'],'required','message'=>'{attribute}不能为空'],
            [['ex_id'], 'exist','targetClass' => 'app\models\freight\template', 'message' => '{attribute}不存在'],
        ];
    }


    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('freight_template');
        $obj->setData(['del'=>1]);
        $obj->setWhere(['ex_id='=>$form->ex_id]);
        return $obj->run();

    }

}