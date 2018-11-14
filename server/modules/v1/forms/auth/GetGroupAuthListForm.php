<?php

namespace app\modules\v1\forms\auth;


use app\models\AdminUser;
use app\modules\v1\service\auth\AuthService;
use app\modules\v1\service\sql\sqlService;
use app\modules\v1\utils\CodeMsgMap;

use app\modules\v1\utils\Filter;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class GetGroupAuthListForm extends CommonForm
{
    public $pageNum;
    public $group_id;



    public function rules()
    {
        return [
            [['pageNum'],'match','pattern'=>'/^\d+$/'],
            [['group_id'],'match','pattern'=>'/^\d+$/'],
        ];
    }

    public function run($form){



        $data=AuthService::get_list_by_groupid($form->pageNum,$form->group_id);

        return $data;
    }

}