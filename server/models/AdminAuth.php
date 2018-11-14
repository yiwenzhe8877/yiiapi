<?php

namespace app\models;

use app\modules\v1\utils\CodeMsgMap;
use Yii;

/**
 * This is the model class for table "tk_auth".
 *
 * @property string $auth_id 自增ID
 * @property string $auth_name 权限名称
 * @property string $parent_id 父权限ID:0顶级权限
 * @property string $module_name 模块名
 * @property string $auth_c 控制器名称
 * @property string $auth_a 方法名称
 * @property int $sort_order 排序
 * @property int $is_menu 是否为菜单
 * @property string $ico 图标
 *
 * @property AdminGroupAuth[] $groupAuths
 */
class AdminAuth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tk_admin_auth';
    }


    //group 和 auth 同步到group_auth表中
    public static function syn_group_auth(){
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

    public static function get_list($pageNum,$name,$module,$controller,$action){
        $pagesize=\Yii::$app->params['page_size'];

        $model= AdminAuth::find()
            ->select('*')
            ->orderBy('auth_id desc')
            ->offset(($pageNum-1)*$pagesize)
            ->limit($pagesize);

        if(!empty($name)){

            $model=$model->andwhere(['=','name',$name]);
        }

        if(!empty($module)){
            $model=$model->andwhere(['=','module',$module]);
        }

        if(!empty($controller)){
            $model=$model->andwhere(['=','controller',$controller]);
        }
        if(!empty($action)){
            $model=$model->andwhere(['=','action',$action]);
        }

      //  var_dump($model->createCommand()->getRawSql());
        $data=$model->asArray(true)->all();

        for ($i=0,$l=count($data);$i<$l;$i++){
            $item=$data[$i];

            $data[$i]['del_msg']=CodeMsgMap::Map('del',$item['del']);
            $data[$i]['status_msg']=CodeMsgMap::Map('status',$item['status']);
        }


        $count=$model->count();

        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>(int)$count,
            'list'=>$data
        ];
    }

}
