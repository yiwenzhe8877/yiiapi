<?php

namespace app\modules\v2\factory\store;

use app\modules\v2\factory\BaseFactory;

class GroupFactory extends BaseFactory
{
    public $form_map = [
        'storegroup.delete'=>'app\modules\v2\forms\store\group\DeleteForm',
        'storegroup.add'=>'app\modules\v2\forms\store\group\AddForm',
        'storegroup.getlist'=>'app\modules\v2\forms\store\group\GetListForm',
        'storegroup.update'=>'app\modules\v2\forms\store\group\UpdateForm',
        'storegroup.getall'=>'app\modules\v2\forms\store\group\GetAllForm',
    ];

}