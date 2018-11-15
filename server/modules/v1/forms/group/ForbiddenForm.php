<?php

namespace app\modules\v1\forms\group;


use app\componments\utils\ApiException;
use app\models\AdminGroup;
use app\modules\v1\forms\CommonForm;

class ForbiddenForm extends CommonForm
{
    public $id;





    public function run(){
        $model=AdminGroup::find()
            ->andWhere(['=','group_id',$this->id])
            ->one();

        if(!$model){
            ApiException::run("管理组id不存在",'900001');
        }

        $model=AdminGroup::findOne($this->id);
        $model->status=0;
        $model->save();
    }

}