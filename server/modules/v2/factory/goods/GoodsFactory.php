<?php

namespace app\modules\v2\factory\goods;

use app\modules\v2\factory\BaseFactory;

class GoodsFactory extends BaseFactory
{
    public $form_map = [
        'goodsgoods.delete'=>'app\modules\v1\forms\goods\goods\DeleteForm',
        'goodsgoods.add'=>'app\modules\v1\forms\goods\goods\AddForm',
        'goodsgoods.getlist'=>'app\modules\v1\forms\goods\goods\GetListForm',
        'goodsgoods.update'=>'app\modules\v1\forms\goods\goods\UpdateForm',
        'goodsgoods.getall'=>'app\modules\v1\forms\goods\goods\GetAllForm',
    ];

}