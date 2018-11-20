<?php
/**
 * Created by PhpStorm.
 * adminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v2\factory\member;


use app\modules\v2\factory\BaseFactory;

class BaseinfoFactory extends BaseFactory
{
    public $form_map = [
        'memberbaseinfo.delete'=>'app\modules\v2\forms\member\baseinfo\DeleteForm',
        'memberbaseinfo.add'=>'app\modules\v2\forms\member\baseinfo\AddForm',
        'memberbaseinfo.getlist'=>'app\modules\v2\forms\member\baseinfo\GetListForm',
        'memberbaseinfo.update'=>'app\modules\v2\forms\member\baseinfo\UpdateForm',
        'memberbaseinfo.getall'=>'app\modules\v2\forms\member\baseinfo\GetAllForm',
        'memberbaseinfo.xcxadd'=>'app\modules\v2\forms\member\baseinfo\XcxAddForm',
        'memberbaseinfo.xcxdecrptunionid'=>'app\modules\v2\forms\member\baseinfo\XcxDecrptUnionidForm',
    ];

}