<?php

namespace app\modules\v1\forms\admin\menu;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

class GetListForm extends CommonForm
{
    public $pageNum;


    

    public function run(){

        $wheresql=[];

        $data=sqlService::get_list_by_page('*','tk_admin_menu',$wheresql,'menu_id desc');

        return $data;
    }

}