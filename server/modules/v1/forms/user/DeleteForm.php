<?php

namespace app\modules\v1\forms\user;


use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\utils\ApiException;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class DeleteForm extends CommonForm
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