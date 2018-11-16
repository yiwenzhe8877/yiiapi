<?php

namespace app\controllers;

use app\componments\sql\SqlDelete;
use app\componments\sql\SqlUpdate;
use app\componments\utils\ApiException;
use app\componments\utils\DateUtils;
use app\componments\utils\RandomUtils;
use app\models\api\upload\UploadImgApi;

use yii\web\Controller;


class SiteController extends Controller
{



    public function actionIndex()
    {


        //$dir = './'.iconv('UTF-8','gbk',basename($_FILES['file']['name']));
        //move_uploaded_file($_FILES['file']['tmp_name'],$dir);
       // var_dump($_FILES);
       /* $obj=new UploadImgApi();
        $obj->setDir(DateUtils::getYMD());
        $obj->setFilename(RandomUtils::get_random_num(10));

        $obj->run();
        return ['url'=>$obj->getFullPath(),'filename'=>$obj->getFileNameWithExt()];
*/
       /* $obj=new SqlDelete();
        $obj->setTableName('tk_admin_user');
        $obj->setWhere(['user_id ='=>'37']);
        return $obj->run();*/
        $obj=new SqlUpdate();
        $obj->setTableName('tk_admin_user');
        $obj->setWhere(['user_id ='=>'37']);
        $obj->setFields(['username'=>'1111','nickname'=>'2222']);
        return $obj->run();
    }



}
