<?php

namespace app\modules\v3\forms\store\menu;

use app\componments\sql\SqlUpdate;
use app\componments\common\CommonForm;

class DeleteForm extends CommonForm
{
    public $id;

    public function addRule(){
        return [
            [['id'],'required','message'=>'{attribute}不能为空'],
            [['id'], 'exist','targetClass' => 'app\models\store\menu', 'message' => '{attribute}不存在'],
        ];
    }


    public function run($form){
        $obj=new SqlUpdate();
        $obj->setTableName('store_menu');
        $obj->setWhere(['id='=>$form->id]);
        return $obj->run();

    }

}