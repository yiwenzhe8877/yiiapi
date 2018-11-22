<?php

namespace app\modules\v2\forms\goods\category;

use app\componments\sql\SqlCreate;

use app\modules\v2\forms\CommonForm;

class AddForm extends CommonForm
{
    public $classname;
    public $display;
    public $sort;
    public $level;
    public $upid;
    public $classtype;


    public function addRule(){
        return [
            [['classname'],'required','message'=>'{attribute}不能为空'],
            ['classname', 'unique', 'targetClass' => 'app\models\goods\category', 'message' => '{attribute}已经存在'],
        ];
    }

    public function run($form){

        $obj=new SqlCreate();
        $obj->setTableName('goods_category');
        $obj->setData($form);
        $obj->run();

    }
}