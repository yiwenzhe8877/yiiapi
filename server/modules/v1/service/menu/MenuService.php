<?php

namespace app\modules\v1\service\menu;

use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminGroupAuth;
use app\models\AdminMenu;
use app\models\MenuGroup;
use app\modules\v1\service\user\UserService;
use app\modules\v1\utils\ApiException;


class MenuService
{
    public static function sync(){
        $menu=AdminMenu::find()->all();
        $group=AdminGroup::find()->all();

        for($i=0;$i<count($group);$i++){

            $group_id=$group[$i]->group_id;
            for($j=0;$j<count($menu);$j++){
                $menu_id=$menu[$j]->menu_id;

                $data=MenuGroup::find()
                    ->andWhere(['=','group_id',$group_id])
                    ->andWhere(['=','menu_id',$menu_id])
                    ->one();
                if(!$data){
                    $model=new MenuGroup();
                    $model->menu_id=$menu_id;
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
                tk_auth.name,
                tk_auth.module,
                tk_auth.controller,
                tk_auth.action,
                ")
            ->leftJoin('tk_group_auth','tk_auth.auth_id=tk_group_auth.auth_id')
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


    public static function getMenuGroupRelation(){

        $user=UserService::getAdminUser();

        $group_id=$user->group_id;

        $menuarr=AdminGroup::findOne($group_id)->groupMenus;

        $menuids='';
        for($i=0;$i<count($menuarr);$i++){
            $menuids.=$menuarr[$i]->menu_id.',';
        }
        $menu_ids=substr($menuids,0,strlen($menuids)-1);

        $sql='select * FROM tk_admin_menu order by sort desc';
        if(!empty($menu_ids)){
            $sql=   'select * FROM tk_admin_menu where menu_id in ('.$menu_ids.') order by sort desc';
        }
        $data = \Yii::$app->db->createCommand($sql)->queryAll();

        $pidarr=[];
        $temp=[];
        for($i=0;$i<count($data);$i++){
            $pid=$data[$i]['pid'];
            $menu_id=$data[$i]['menu_id'];
            if($pid==0){
                $data[$i]['child']=[];
                array_push($temp,$data[$i]);
                array_push($pidarr,$menu_id);
            }
        }
        for($i=0;$i<count($data);$i++){
            $pid=$data[$i]['pid'];
            if($pid==0){continue;}

            for($j=0;$j<count($temp);$j++){
                if($pid==$temp[$j]['menu_id']){
                    array_push($temp[$j]['child'],$data[$i]);
                }
            }

        }

        return [
            'list'=>$temp
        ];



    }
}