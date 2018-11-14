<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * Date: 2018/8/7
 * Time: 16:20
 */

namespace app\modules\v1\controllers;


use app\models\AdminMenu;
use app\modules\v1\common\BaseController;
use app\modules\v1\forms\menu\AddOrUpdateForm;
use app\modules\v1\forms\menu\DeleteForm;

class MenuController extends BaseController
{
    public function verbs()
    {
        return [
            'index'=>['POST'],
            'change-password'=>['POST'],
            'get-menu'=>['GET'],
            'read'=>['GET'],
            'logout'=>['GET'],
            'update'=>['post'],
            'add'=>['post'],
            'delete'=>['get','post'],
        ];
    }

    public function actionAddorupdate()
    {

        $form = new AddOrUpdateForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException($form->getError(),'900000');
        }

        $form->save();
        return "";
    }
    public function actionDelete()
    {

        $form = new DeleteForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException($form->getError(),'900000');

        }

        $form->delete();
        return "";
    }

    public function actionGetlist()
    {

        $data=AdminMenu::get_list();
        return $data;
    }

}