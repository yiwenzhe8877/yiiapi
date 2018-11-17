<?php

namespace app\modules\v1\forms\member\address;



use app\componments\sql\SqlGet;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

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
        $obj->setTableName('member_address');
        $obj->setOrderBy('addr_id desc');
        $obj->setPageNum($form->pageNum);
        return $obj->get_list();
    }

}