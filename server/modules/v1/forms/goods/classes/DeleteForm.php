<?php

namespace app\modules\v1\forms\goods\category;


use app\componments\utils\ApiException;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $id;



    public function run($form){

        $arr=explode(',',$form->id);



        foreach ($arr as $v){
            $model=AdminUser::find()
                ->andWhere(['=','user_id',$v])
                ->one();

            if(!$model){
                ApiException::run("用户id不存在",'900001');
            }

            $model=AdminUser::findOne($v);
            $model->del=1;
            $model->save();
        }
        return "";


    }

}