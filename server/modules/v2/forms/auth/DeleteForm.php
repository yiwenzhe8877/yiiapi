<?php

namespace app\modules\v1\forms\auth;


use app\models\AdminAuth;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\utils\ApiException;

class DeleteForm extends CommonForm
{
    public $id;




    public function run($form){


        $arr=explode(',',$form->id);

        foreach ($arr as $v){
            $model=AdminAuth::find()
                ->andWhere(['=','auth_id',$v])
                ->one();

            if(!$model){
                ApiException::run("id不存在",'900001');
            }

            $model=AdminAuth::findOne($v);
            $model->del=1;
            $model->save();
        }

        return "";


    }

}