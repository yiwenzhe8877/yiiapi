<?php

namespace app\modules\v1\forms\admin\user;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\sql\sqlService;

class GetListForm extends CommonForm
{
    public $pageNum;









    public function run(){

        $wheresql=[];

        $data=sqlService::get_list_by_page('*','tk_admin_user',$wheresql,'user_id desc');

        return $data;
    }

}