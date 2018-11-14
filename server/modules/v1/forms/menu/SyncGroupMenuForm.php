<?php

namespace app\modules\v1\forms\menu;


use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\menu\MenuService;

class SyncGroupMenuForm extends CommonForm
{


    public function rules()
    {
        return [
        ];
    }


    public function run(){

        MenuService::sync();
        return "";
    }


}