<?php

namespace app\modules\v1\forms\admin\menu;


use app\models\api\admin\group\AdminGroupApi;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\menu\MenuService;

class SyncGroupMenuForm extends CommonForm
{

    public function run(){

      return AdminGroupApi::syncMenus();
    }


}