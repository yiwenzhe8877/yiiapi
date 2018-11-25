<?php

namespace app\modules\v2\factory\store;

use app\modules\v2\factory\BaseFactory;

class MenuFactory extends BaseFactory
{
    public $form_map = [
        'storemenu.delete'=>'app\modules\v2\forms\store\menu\DeleteForm',
        'storemenu.add'=>'app\modules\v2\forms\store\menu\AddForm',
        'storemenu.getlist'=>'app\modules\v2\forms\store\menu\GetListForm',
        'storemenu.update'=>'app\modules\v2\forms\store\menu\UpdateForm',
        'storemenu.getall'=>'app\modules\v2\forms\store\menu\GetAllForm',
        'storemenu.getrelationmenu'=>'app\modules\v2\forms\store\menu\GetRelationMenuForm'
    ];

}