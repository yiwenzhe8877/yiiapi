<?php

namespace app\modules\v1\forms\menu;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\menu\MenuService;
use app\modules\v1\service\sql\sqlService;

class GetMenuGroupRelationForm extends CommonForm
{



    public function rules()
    {
        return [
        ];
    }

    public function run(){

        $data=MenuService::getMenuGroupRelation();
        return $data;
    }

}