<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * Date: 2018/7/24
 * Time: 15:31
 */

namespace app\modules\v1\controllers;


use app\models\AdminGroup;
use app\models\AdminMenu;
use app\modules\v1\common\BaseController;
use app\modules\v1\forms\AddGroupForm;
use app\modules\v1\forms\group\AddForm;
use app\modules\v1\forms\group\DeleteForm;
use app\modules\v1\forms\group\ForbiddenForm;
use app\modules\v1\forms\group\UpdateForm;
use app\modules\v1\utils\ApiException;

class GroupController extends BaseController
{



    public function actionDelete()
    {

        $form = new DeleteForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000',__CLASS__,__METHOD__,__LINE__);
        }

        $form->run();
        return "";
    }


    public function actionUpdate()
    {

        $form = new UpdateForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000',__CLASS__,__METHOD__,__LINE__);
        }

        $form->run();
        return "";
    }

    public function actionForbidden()
    {

        $form = new ForbiddenForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000',__CLASS__,__METHOD__,__LINE__);
        }

        $form->run();
        return "";
    }


    public function actionGetlist($pageNum,$group_name='')
    {

        $data=AdminGroup::get_list($pageNum,$group_name);
        return $data;
    }


    public function actionGetall()
    {

        $data=AdminGroup::get_all();
        return $data;
    }


    //获得用户组菜单
    public function actionGetMenu()
    {
        $z=AdminMenu::getMenu(\Yii::$app->getUser()->getId());
       return $z;
    }

    public function actionAuth()
    {

        var_dump( 222);
    }

    public function actionReadall()
    {
        $r=AdminGroup::find()->where(['status'=>1])->all();
        return $r;
    }

    public function actionAdd(){
        $form = new AddForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000');
        }

        $form->run();
        return "";

    }

}