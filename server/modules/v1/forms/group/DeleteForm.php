<?php

namespace app\modules\v1\forms\group;


use app\models\AdminGroup;
use app\models\AdminUser;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\utils\ApiException;

class DeleteForm extends CommonForm
{
    public $id;



    public function rules()
    {
        return [
            ['id','required','message'=>'id不能为空'],
        ];
    }

    public function run($form){


        $arr=explode(',',$form->id);

        foreach ($arr as $v){
            $model=AdminGroup::find()
                ->andWhere(['=','group_id',$v])
                ->one();

            if(!$model){
                ApiException::run("管理组id不存在",'900001');
            }

            $model=AdminGroup::findOne($v);
            $model->del=1;
            $model->save();

        }
        return "";
    }

}