<?php

namespace app\modules\v2\forms\member\evaluat;



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
        $obj->setTableName('member_evaluat');
        $obj->setOrderBy('id desc');
        $obj->setPageNum($form->pageNum);
        return $obj->get_list();
    }

}