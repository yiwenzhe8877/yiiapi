<?php

namespace app\modules\v2\forms\admin\menugroup;



use app\componments\sql\SqlGet;
use app\modules\v2\forms\CommonForm;

class GetListForm extends CommonForm
{

    public $pageNum;


    public function addRule(){
        return [
            [['pageNum'],'required','message'=>'{attribute}不能为空'],
        ];
    }


    public function run($form){

        $obj=new SqlGet();
        $obj->setTableName('admin_menugroup');
        $obj->setOrderBy('menu_id desc');
        $obj->setPageNum($form->pageNum);
        return $obj->get_list();
    }

}