<?php

namespace app\modules\v1\service\auth;

use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminGroupAuth;
use app\modules\v1\utils\ApiException;


class AuthService
{
    public static function  sync(){
        $auth=AdminAuth::find()->all();
        $group=AdminGroup::find()->all();

        for($i=0;$i<count($group);$i++){

            $group_id=$group[$i]->group_id;
            for($j=0;$j<count($auth);$j++){
                $auth_id=$auth[$j]->auth_id;

                $data=AdminGroupAuth::find()
                    ->andWhere(['=','group_id',$group_id])
                    ->andWhere(['=','auth_id',$auth_id])
                    ->one();
                if(!$data){
                    $model=new AdminGroupAuth();
                    $model->auth_id=$auth_id;
                    $model->group_id=$group_id;
                    $model->status=1;
                    $model->save();
                }

            }
        }
    }

    //根据group_id获得groupauth列表
    public static function get_list_by_groupid($pageNum,$group_id){

        $pagesize=\Yii::$app->params['page_size'];

        $r=AdminGroup::findOne($group_id);
        if(!$r){
            ApiException::run("group_id不存在",'900001');
        }


        $model= AdminAuth::find()
            ->select(
                "tk_group_auth.auth_id,
                tk_group_auth.group_id,
                tk_group_auth.status,
                tk_admin_auth.name,
                tk_admin_auth.module,
                tk_admin_auth.controller,
                tk_admin_auth.action,
                ")
            ->leftJoin('tk_group_auth','tk_admin_auth.auth_id=tk_group_auth.auth_id')
            ->andWhere(['=','tk_group_auth.group_id',$group_id])
            ->offset(($pageNum-1)*$pagesize)
            ->limit($pagesize);


        $data=$model->asArray(true)->all();
        $count=$model->count();


        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>(int)$count,
            'list'=>$data
        ];

    }

    //根据group_id获得groupauth列表
    public static function get_all_by_groupid($pageNum,$group_id){

        $pagesize=\Yii::$app->params['page_size'];


        $r=AdminGroup::findOne($group_id);
        if(!$r){
            ApiException::run("group_id不存在",'900001');
        }

        $model= AdminAuth::find()
            ->select(
                "tk_group_auth.auth_id,
                tk_group_auth.group_id,
                tk_group_auth.status,
                tk_auth.name,
                tk_auth.module,
                tk_auth.controller,
                tk_auth.action,
                ")
            ->leftJoin('tk_group_auth','tk_auth.auth_id=tk_group_auth.auth_id')
            ->andWhere(['=','tk_group_auth.group_id',$group_id]);


        $data=$model->asArray(true)->all();
        $count=$model->count();


        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>(int)$count,
            'list'=>$data
        ];

    }
}