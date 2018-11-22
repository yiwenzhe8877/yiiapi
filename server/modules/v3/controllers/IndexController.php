<?php

namespace app\modules\v2\controllers;

use app\componments\utils\ApiException;
use app\models\api\sms\SendSmsCodeApi;
use app\modules\v2\common\BaseController;
use app\modules\v2\factory\Factory;

class IndexController  extends BaseController
{


    public function actionIndex()
    {


        $post=\Yii::$app->getRequest()->post();
        if(empty($post['service']) || !isset($post['service'])){
            ApiException::run("service参数缺失",'900001',__CLASS__,__METHOD__,__LINE__);
        }

        $service=$post['service'];

        $factory = Factory::createInstance($service);


        define('FORM_CLASS',$factory->form_map[$service]);

        $form=$factory->getForm($service);


        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000',__CLASS__,__METHOD__,__LINE__);
        }


        $service=$factory->getRun($service);

        $data=\Yii::$app->getRequest()->post();

        foreach ($data as $key=>$value)
        {
            if ($key === 'service')
                unset($data[$key]);
        }
        $objdata=(object)$data;


        return $service->run($objdata);

    }


    public function actionTest()
    {

        SendSmsCodeApi::send_code('18658771302','123123','huasdhua');

    }

}