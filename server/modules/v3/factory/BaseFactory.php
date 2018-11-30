<?php
/**
 * Created by PhpStorm.
 * adminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:11
 */

namespace app\modules\v3\factory;

class BaseFactory
{
    protected $form_map = [];
    protected $run_map = [];

    public function getForm($service)
    {
        $clazz = $this->form_map[$service];
        return new $clazz();
    }

    public function getRun($service)
    {
        $clazz = $this->form_map[$service];
        return new $clazz();
    }

}