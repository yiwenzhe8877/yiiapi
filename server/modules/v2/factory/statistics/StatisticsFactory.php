<?php

namespace app\modules\v2\factory\statistics;

use app\modules\v2\factory\BaseFactory;

class StatisticsFactory extends BaseFactory
{
    public $form_map = [
        'adminindex.statistics'=>'app\modules\v2\forms\statistics\index\GetForm',
    ];
}