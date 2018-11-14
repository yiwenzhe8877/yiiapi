<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * Date: 2018/7/24
 * Time: 13:50
 */

namespace app\modules\v1\controllers;


use app\componments\auth\QueryParamAuth;
use app\models\AdminAuth;
use app\models\AdminUser;
use app\modules\v1\common\BaseController;
use app\modules\v1\forms\auth\AddForm;
use app\modules\v1\forms\auth\AddOrUpdateForm;
use app\modules\v1\forms\auth\DeleteForm;
use app\modules\v1\forms\auth\SetGroupAuthForm;
use app\modules\v1\forms\auth\UpdateForm;
use app\modules\v1\forms\user\LoginForm;
use app\modules\v1\utils\ApiException;
use yii\data\Pagination;


class AuthController extends BaseController
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


    public function actionAdd(){
        $form = new AddForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000');
        }

        $form->run();
        return "";
    }

    public function actionSetgroupauth(){
        $form = new SetGroupAuthForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000');
        }

        $form->run();
        return "";
    }


    public function actionSyncgroupauth(){

        AdminAuth::syn_group_auth();
        return "";
    }


    public function actionUpdate(){
        $form = new UpdateForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000');
        }

        $form->run();
        return "";
    }



    public function actionDelete()
    {

        $form = new DeleteForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException::run($form->getError(),'900000');
        }

        $form->delete();
        return "";
    }

    public function actionGetlist($pageNum=1,$name='',$module='',$controller='',$action='')
    {

        $data=AdminAuth::get_list($pageNum,$name,$module,$controller,$action);
        return $data;
    }



    //登录
    public function actionLogin()
    {
        $form = new LoginForm();
        if($form->load(\Yii::$app->getRequest()->post(),'') && !$form->validate())
        {
            ApiException($form->getError(),'900000');
        }

        $auth_key=$form->login();
        return ['accessToken'=>$auth_key];

    }
    //权限测试
    public function actionTest()
    {

        return "11";
    }



    //获得用户信息
    public function actionGetone(){
        $uid=\Yii::$app->getUser()->getId();

        $user=AdminUser::findOne($uid);
        return $user;
    }



    //退出登录
    public function actionLogout()
    {
        AdminUser::logout();
        return "";
    }

    //列表
    public function actionRead()
    {
        $page=\Yii::$app->getRequest()->get('page');
        $username=\Yii::$app->getRequest()->get('username');

        $query=AdminUser::find()->asArray();

        if(!empty($username)){
            $query->andWhere(['like', 'username', $username]);
        }

        $count=$query->count();

        $p = new Pagination(['totalCount' => $count]);

        $query->offset($p->getOffset());
        $query->limit($p->getLimit());

        $data = $query->all();

        return ['list'=>$data,'current_page'=>$page,'page_size'=>$p->getPageSize(),'total_count'=>$count];
    }
}