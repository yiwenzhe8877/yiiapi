<?php

namespace app\modules\v1\forms\order\log;

use app\componments\sql\SqlUpdate;
use app\modules\v1\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $log_id;

    public function addRule(){
        return [
            [['log_id'],'required','message'=>'{attribute}不能为空'],
            [['log_id'], 'exist','targetClass' => 'app\models\order\log', 'message' => '{attribute}不存在'],
        ];
    }


    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('order_log');
        $obj->setWhere(['log_id='=>$form->log_id]);
        return $obj->run();

    }

}