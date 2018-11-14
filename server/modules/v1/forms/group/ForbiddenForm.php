<?php

namespace app\modules\v1\forms\group;


use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\utils\ApiException;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class ForbiddenForm extends CommonForm
{
    public $id;



    public function rules()
    {
        $result=parent::getRules(FORM_CLASS);


        return array_merge($result,$this->addRule());
    }

    public function addRule(){
        return [

        ];
    }

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