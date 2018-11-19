<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\componments\auth;

use app\componments\utils\ApiException;
use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminGroupAuth;
use app\models\api\admin\user\GetLoginedAdminUserApi;
use app\modules\v1\service\user\UserService;
use app\utils\ResponseMap;

use yii\filters\auth\AuthMethod;

/**
 * QueryParamAuthBackEnd is an action filter that supports the authentication based on the access token passed through a query parameter.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class QueryParamAuthBackEnd extends AuthMethod
{
    /**
     * @var string the parameter name for passing the access token
     */
    public $tokenParam = 'token';
    public static $token = 'token';

    public  $white=['adminUser.login'];

    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {

        $accessToken=$request->headers['token'];

        if(!$accessToken){
            $accessToken = $request->get($this->tokenParam);
        }

        $service=\Yii::$app->getRequest()->post('service');
        if(in_array($service,$this->white)){
            return true;
        }




        if (is_string($accessToken) && !empty($accessToken)) {

            //$identity = $adminUser->loginByAccessToken($accessToken, get_class($this));
            $identity =GetLoginedAdminUserApi::getAllInfo();

            if ($identity !== null) {

                $this->handleApiAuth($identity);
                return $identity;
            }
        }


        if (empty($accessToken) ) {

            $this->handlefailure($response);
        }

        return true;
    }

 

    public function handlefailure($response)
    {
       ApiException::run(ResponseMap::Map('300001'),'300001',__CLASS__,__METHOD__,__LINE__);
    }

    public function handleApiAuth($identity){

        if($identity->username=='admin'){
            return;
        }

        $group_id=$identity->group_id;

        $group=AdminGroup::findOne($group_id);

        if(!$group){
            ApiException::run(ResponseMap::Map('710001'),'710001',__CLASS__,__METHOD__,__LINE__);
        }

        $re=\Yii::$app->getRequest()->pathInfo;

        $arr=explode('/',$re);

        $module=$arr[0];
        $controller=$arr[1];
        $action=$arr[2];


        $auth=AdminAuth::find()
            ->andwhere(['=','module',$module])
            ->andwhere(['=','controller',$controller])
            ->andwhere(['=','action',$action])
            ->one();

        if(!$auth){
            ApiException::run('该接口不存在','900001',__CLASS__,__METHOD__,__LINE__);
        }

        if($auth->del==1){
            ApiException::run('该接口被删除','900001',__CLASS__,__METHOD__,__LINE__);
        }
        if($auth->status==0){
            ApiException::run('该接口被禁用','900001',__CLASS__,__METHOD__,__LINE__);
        }

        $auth_id=$auth->auth_id;


        $data=AdminGroupAuth::find()
            ->where(['=','group_id',$group_id])
            ->andwhere(['=','auth_id',$auth_id])
            ->andwhere(['=','status',1])
            ->all();


        if(!$data){
            ApiException::run(ResponseMap::Map('710002'),'710002',__CLASS__,__METHOD__,__LINE__);
        }


    }



}