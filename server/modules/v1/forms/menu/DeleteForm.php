<?php

namespace app\modules\v1\forms\menu;


use app\models\AdminAuth;
use app\models\AdminMenu;
use app\modules\v1\forms\CommonForm;
use app\componments\utils\ApiException;

class DeleteForm extends CommonForm
{
    public $id;








    public function run($form){


        $arr=explode(',',$form->id);

        foreach ($arr as $v){
            $model=AdminMenu::find()
                ->andWhere(['=','menu_id',$v])
                ->one();

            if(!$model){
                ApiException::run("id不存在",'900001');
            }

            $model=AdminMenu::findOne($v);
            $model->del=1;
            $model->save();
        }

        return "";


    }

}