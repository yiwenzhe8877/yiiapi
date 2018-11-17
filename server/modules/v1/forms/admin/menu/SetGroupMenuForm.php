<?php

namespace app\modules\v1\forms\admin\menu;


use app\componments\utils\ApiException;
use app\models\AdminGroup;
use app\models\AdminMenu;
use app\models\AdminMenuGroup;
use app\modules\v1\forms\CommonForm;

class SetGroupMenuForm extends CommonForm
{
    public $group_id;
    public $menu_id;




    public function addRule(){
        return [
            ['group_id','required','message'=>'管理组id不能为空'],
            ['menu_id','required','message'=>'菜单id不能为空'],
        ];
    }

    public function run($form){

        $model=AdminGroup::find()
            ->andwhere(['=','group_id',$form->group_id])
            ->all();
        if(!$model){
            ApiException::run("管理组id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }

        $arr=explode(',',$form->menu_id);

        foreach ($arr as $v){
            $model=AdminMenu::find()
                ->andWhere(['=','menu_id',$v])
                ->one();

            if(!$model){
                ApiException::run("菜单id:".$v."不存在",'900001');
            }



            $model=AdminMenuGroup::find()
                ->andWhere(['=','menu_id',$v])
                ->andWhere(['=','group_id',$form->group_id])
                ->one();

            if(!$model){
                ApiException::run("菜单id:".$v."不存在",'900001');
            }
        }

        $data=AdminMenuGroup::find()
            ->andWhere(['=','group_id',$form->group_id])
            ->all();

        for($i=0,$l=count($data);$i<$l;$i++){
            $menu_id=$data[$i]->menu_id;
            if(in_array($menu_id,$arr)){
                $s=1;
            }else{
                $s=0;
            }

            $model=AdminMenuGroup::find()
                ->andWhere(['=','menu_id',$menu_id])
                ->andWhere(['=','group_id',$form->group_id])
                ->one();
            $model->status=$s;
            $model->save();
        }
        return "";

    }


}