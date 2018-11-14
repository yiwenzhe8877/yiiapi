<?php

namespace app\modules\v1\forms\auth;


use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminGroupAuth;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\utils\ApiException;

class SetGroupAuthForm extends CommonForm
{
    public $group_id;
    public $auth_id;


    public function rules()
    {
        return [
            ['group_id','required','message'=>'管理组id不能为空'],
            ['auth_id','required','message'=>'权限id不能为空'],
        ];
    }


    public function run($form){

        $model=AdminGroup::find()
            ->andwhere(['=','group_id',$form->group_id])
            ->all();
        if(!$model){
            ApiException::run("管理组id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }

        $arr=explode(',',$form->auth_id);

        foreach ($arr as $v){
            $model=AdminAuth::find()
                ->andWhere(['=','auth_id',$v])
                ->one();

            if(!$model){
                ApiException::run("权限id:".$v."不存在",'900001');
            }



            $model=AdminGroupAuth::find()
                ->andWhere(['=','auth_id',$v])
                ->andWhere(['=','group_id',$form->group_id])
                ->one();

            if(!$model){
                ApiException::run("权限id:".$v."不存在",'900001');
            }
        }

        $data=AdminGroupAuth::find()
            ->andWhere(['=','group_id',$form->group_id])
            ->all();

        for($i=0,$l=count($data);$i<$l;$i++){
            $auth_id=$data[$i]->auth_id;
            if(in_array($auth_id,$arr)){
                $s=1;
            }else{
                $s=0;
            }

            $model=AdminGroupAuth::find()
                ->andWhere(['=','auth_id',$auth_id])
                ->andWhere(['=','group_id',$form->group_id])
                ->one();
            $model->status=$s;
            $model->save();
        }
        return "";

    }


}