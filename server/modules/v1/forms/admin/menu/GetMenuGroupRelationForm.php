<?php

namespace app\modules\v1\forms\admin\menu;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\menu\MenuService;

class GetMenuGroupRelationForm extends CommonForm
{





    public function run(){

        $data=MenuService::getMenuGroupRelation();
        return $data;
    }

}