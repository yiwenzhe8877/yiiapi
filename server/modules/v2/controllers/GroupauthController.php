<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * Date: 2018/7/24
 * Time: 13:50
 */

namespace app\modules\v1\controllers;


use app\componments\auth\QueryParamAuth;
use app\models\AdminGroupAuth;
use app\modules\v1\common\BaseController;


class GroupauthController extends BaseController
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



    public function actionGetlist($pageNum='',$group_id='')
    {


        $data=AdminGroupAuth::get_list($pageNum,$group_id);
        return $data;
    }



    public function actionGetlistall()
    {

        $data=AdminGroupAuth::get_list_all();
        return $data;
    }
}