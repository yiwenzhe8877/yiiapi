<?php

namespace app\modules\v2\factory\goods;

use app\modules\v2\factory\BaseFactory;

class ModelsFactory extends BaseFactory
{
    public $form_map = [
        'goodsmodels.delete'=>'app\modules\v1\forms\goods\models\DeleteForm',
        'goodsmodels.add'=>'app\modules\v1\forms\goods\models\AddForm',
        'goodsmodels.getlist'=>'app\modules\v1\forms\goods\models\GetListForm',
        'goodsmodels.update'=>'app\modules\v1\forms\goods\models\UpdateForm',
        'goodsmodels.getall'=>'app\modules\v1\forms\goods\models\GetAllForm',
    ];

}