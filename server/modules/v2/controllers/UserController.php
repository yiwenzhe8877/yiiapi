<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * Date: 2018/7/24
 * Time: 13:50
 */

namespace app\modules\v1\controllers;


use app\componments\auth\QueryParamAuth;
use app\models\AdminUser;
use app\modules\v1\common\BaseController;
use app\modules\v1\forms\user\AddForm;
use app\modules\v1\forms\user\AddOrUpdateForm;
use app\modules\v1\forms\user\ChangePasswordForm;
use app\modules\v1\forms\user\DeleteForm;
use app\modules\v1\forms\user\GetListForm;
use app\modules\v1\forms\user\GetOneForm;
use app\modules\v1\forms\user\LoginForm;
use app\modules\v1\forms\user\LogoutForm;
use app\modules\v1\forms\user\UpdateForm;
use app\modules\v1\utils\ApiException;
use yii\data\Pagination;


class UserController extends BaseController
{
    public function verbs()
    {
        return [

        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']=[
            'class'=>QueryParamAuth::className(),
            'optional' => [
                'login',
            ],
        ];
        return $behaviors;
    }


    public function actionChangepassword(){
        $form = new ChangePasswordForm();

        $form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate();
        $form->run();
        return "";
    }


    public function actionAdd(){


        $form = new AddForm();

        $form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate();
        $form->run();
        return "";

    }



    public function actionUpdate()
    {

        $form = new UpdateForm();

        $form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate();
        $form->run();
        return "";
    }


    public function actionDelete()
    {

        $form = new DeleteForm();

        $form->load(\Yii::$app->getRequest()->post(),'') && $form->validate();

        $data=$form->run();
        return $data;
    }

    public function actionGetlist($pageNum,$username='',$phone='')
    {

        $form = new GetListForm();

        $form->load(\Yii::$app->getRequest()->post(),'') && $form->validate();

        $data=$form->run();
        return $data;

    }



    //登录
    public function actionLogin()
    {
        $form = new LoginForm();

        $form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate();
        $data=$form->run();
        return $data;

    }



    //获得用户信息
    public function actionGetone(){
        $form = new GetOneForm();

        $data=$form->run();
        return $data;

    }



    //退出登录
    public function actionLogout()
    {
        $form = new LogoutForm();

        $data=$form->run();
        return $data;
    }


}