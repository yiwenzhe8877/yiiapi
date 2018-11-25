<?php

namespace app\modules\v2\factory\store;

use app\modules\v2\factory\BaseFactory;

class StoreFactory extends BaseFactory
{
    public $form_map = [
        'storestore.delete'=>'app\modules\v2\forms\store\store\DeleteForm',
        'storestore.add'=>'app\modules\v2\forms\store\store\AddForm',
        'storestore.getlist'=>'app\modules\v2\forms\store\store\GetListForm',
        'storestore.update'=>'app\modules\v2\forms\store\store\UpdateForm',
        'storestore.getall'=>'app\modules\v2\forms\store\store\GetAllForm',
        'storeuser.login'=>'app\modules\v2\forms\store\store\LoginForm',
    ];

}