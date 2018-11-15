<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * DateUtils: 2018/10/26
 * Time: 9:09
 */

namespace app\componments\utils;


use app\models\ApiExceptionlog;
use app\models\AdminUser;
use yii\base\UserException;

class ApiException
{

    //抛出异常
    public static function run($msg='',$code='',$class='',$method='',$line=''){

        if(YII_DEBUG){

            $request=\Yii::$app->getRequest();

            $accessToken=$request->headers['token'];

            if(!$accessToken){
                $accessToken = $request->get('token');
            }

            $model=new ApiExceptionlog();

            $model->time=time();
            $model->username=empty($accessToken)?'':$accessToken;
            $model->group_name='';
            $model->range=1;
            $model->class=$class;
            $model->method=$method;
            $model->line=$line;
            $model->code=$code;
            $model->msg=$msg;
            $model->save();

            //$msg.=$method.$line;
        }


        throw new UserException($msg,$code);
    }
}