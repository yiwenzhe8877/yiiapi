<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class MenuFactory extends BaseFactory
{
    public $form_map = [
        'menu.delete'=>'app\modules\v1\forms\menu\DeleteForm',
        'menu.add'=>'app\modules\v1\forms\menu\AddForm',
        'menu.getlist'=>'app\modules\v1\forms\menu\GetListForm',
        'menu.getall'=>'app\modules\v1\forms\menu\GetAllForm',
        'menu.update'=>'app\modules\v1\forms\menu\UpdateForm',
        'menu.syncgroupmenu'=>'app\modules\v1\forms\menu\SyncGroupMenuForm',
        'menu.setgroupmenu'=>'app\modules\v1\forms\menu\SetGroupMenuForm',
        'menu.getmenugrouprelation'=>'app\modules\v1\forms\menu\GetMenuGroupRelationForm',

    ];

    protected $run_map = [
        'menu.delete'=>'app\modules\v1\forms\menu\DeleteForm',
        'menu.add'=>'app\modules\v1\forms\menu\AddForm',
        'menu.getlist'=>'app\modules\v1\forms\menu\GetListForm',
        'menu.getall'=>'app\modules\v1\forms\menu\GetAllForm',
        'menu.update'=>'app\modules\v1\forms\menu\UpdateForm',
        'menu.syncgroupmenu'=>'app\modules\v1\forms\menu\SyncGroupMenuForm',
        'menu.setgroupmenu'=>'app\modules\v1\forms\menu\SetGroupMenuForm',
        'menu.getmenugrouprelation'=>'app\modules\v1\forms\menu\GetMenuGroupRelationForm',

    ];
}