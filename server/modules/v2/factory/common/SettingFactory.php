<?php


namespace app\modules\v2\factory\common;


use app\modules\v2\factory\BaseFactory;

class SettingFactory extends BaseFactory
{
    public $form_map = [

        'commonsetting.add'=>'app\modules\v2\forms\common\setting\AddForm',
        'commonsetting.delete'=>'app\modules\v2\forms\common\setting\DeleteForm',
        'commonsetting.update'=>'app\modules\v2\forms\common\setting\UpdateForm',
        'commonsetting.getlist'=>'app\modules\v2\forms\common\setting\GetListForm',
        'commonsetting.getall'=>'app\modules\v2\forms\common\setting\GetAllForm',

    ];


}