<?php

namespace app\modules\v1\forms\menu;


use app\models\AdminMenu;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\menu\MenuService;
use app\modules\v1\service\model\AddService;
use app\modules\v1\utils\ApiException;

class AddForm extends CommonForm
{
    public $name;
    public $router;
    public $pid;
    public $sort;





    public function addRule(){
        return [
            ['name','required','message'=>'权限名称不能为空'],
            ['router','required','message'=>'路由不能为空'],
            ['pid','required','message'=>'父级不能为空'],
            ['sort','required','message'=>'排序不能为空'],
        ];
    }


    public function run($form){

        $model=AdminMenu::find()
            ->andWhere(['=','name',$form->name])
            ->one();

        if($model){
            ApiException::run("名称已经存在",'900001');
        }




        $otherdata=[

            'del'=>0,
        ];
        AddService::run('menu',$form,[],$otherdata);

        //管理组和菜单同步
        MenuService::sync();


        return "";
    }





}