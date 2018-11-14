<?php

namespace app\modules\v1\forms\menu;


use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminMenu;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;
use app\modules\v1\utils\ApiException;

class UpdateForm extends CommonForm
{
    public $id;
    public $name;
    public $router;
    public $pid;
    public $sort;
    public $del;





    public function addRule(){
        return [
            ['id','required','message'=>'id不能为空'],
            ['name','required','message'=>'权限名称不能为空'],
            ['router','required','message'=>'路由不能为空'],
            ['pid','required','message'=>'父级不能为空'],
            ['sort','required','message'=>'排序不能为空'],
            ['del','required','message'=>'删除标志不能为空'],
        ];
    }


    public function run($form){

        $model=AdminMenu::find()
            ->andwhere(['=','menu_id',$form->id])
            ->one();


        if(!$model){
            ApiException::run("id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }


        UpdateService::run('menu',$form->id,'id',$form);


        return "";
    }


}