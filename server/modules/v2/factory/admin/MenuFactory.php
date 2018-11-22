<?php
/**
 * Created by PhpStorm.
 * adminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v2\factory\admin;


use app\modules\v2\factory\BaseFactory;

class MenuFactory extends BaseFactory
{
    public $form_map = [
        'adminmenu.delete'=>'app\modules\v2\forms\admin\menu\DeleteForm',
        'adminmenu.add'=>'app\modules\v2\forms\admin\menu\AddForm',
        'adminmenu.getlist'=>'app\modules\v2\forms\admin\menu\GetListForm',
        'adminmenu.getall'=>'app\modules\v2\forms\admin\menu\GetAllForm',
        'adminmenu.update'=>'app\modules\v2\forms\admin\menu\UpdateForm',
        'adminmenu.syncgroupmenu'=>'app\modules\v2\forms\admin\menu\SyncGroupMenuForm',
        'adminmenu.setgroupmenu'=>'app\modules\v2\forms\admin\menu\SetGroupMenuForm',
        'adminmenu.getmenugrouprelation'=>'app\modules\v2\forms\admin\menu\GetMenuGroupRelationForm',

    ];
    
}