<?php

namespace app\modules\v2\controllers;

use app\componments\utils\ApiException;
use app\modules\v2\common\BaseController;
use app\modules\v2\factory\Factory;

class IndexController  extends BaseController
{



    public function actionIndex()
    {



        $service=\Yii::$app->getRequest()->headers['service'];


        $postData=\Yii::$app->getRequest()->post();

        if(empty($service))
            $service= $postData['service'];


        $factory = Factory::createInstance($service);




        define('FORM_CLASS',$factory->form_map[$service]);

        $form=$factory->getForm($service);

        $form->load($postData,'');

        if(!$form->validate())
            ApiException::run($form->getError(),'10010001',__CLASS__,__METHOD__,__LINE__);




        $service=$factory->getRun($service);
        $data=$postData;

        foreach ($data as $key=>$value)
        {
            if ($key === 'service')
                unset($data[$key]);
        }
        $objdata=(object)$data;




        return   $service->run($objdata);



    }


}