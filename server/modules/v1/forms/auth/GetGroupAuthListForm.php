<?php

namespace app\modules\v1\forms\auth;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\auth\AuthService;


class GetGroupAuthListForm extends CommonForm
{
    public $pageNum;
    public $group_id;







    public function addRule(){
        return [
            [['group_id'],'match','pattern'=>'/^\d+$/'],
        ];
    }


    public function run($form){



        return AuthService::get_list_by_groupid($form->pageNum,$form->group_id);

    }

}