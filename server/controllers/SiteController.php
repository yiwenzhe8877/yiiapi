<?php

namespace app\controllers;

use app\models\api\common\setting\CommonSettingApi;
use app\models\common\setting;
use yii\web\Controller;


class SiteController extends Controller
{



    public function actionIndex()
    {

        var_dump(CommonSettingApi::getValue('wx','appid'));
        die();

        $tablename='tk_common_setting';
        $module='v1';

        $this->makeApi($tablename);
        $this->makeModel($tablename);
        $this->makeFactory($tablename,$module);
        $this->makeform($tablename,$module,'add');
        $this->makeform($tablename,$module,'getlist');
        $this->makeform($tablename,$module,'getall');
        $this->makeform($tablename,$module,'update');
        $this->makeform($tablename,$module,'delete');
    }

    private function makeApi($tablename){
        if($tablename=='')return;

        $arr=explode('_',$tablename);
        $one=$arr[1];
        $two=$arr[2];
        $z=file_get_contents('./template/api.txt');
        $z=str_replace('{one}',$one,$z);
        $z=str_replace('{two}',$two,$z);
        $z=str_replace('{classname}',ucfirst($one).ucfirst($two).'Api',$z);

        $dir_one='../models/api/'.$one;
        $dir_two=$dir_one.'/'.$two;

        $filename=ucfirst($one).ucfirst($two).'Api.php';
        if(!is_dir($dir_one)){
            mkdir($dir_one);
        }
        if(!is_dir($dir_two)){
            mkdir($dir_two);
        }

        if(!file_exists($dir_two.'/'.$filename)){
            $myfile = fopen($dir_two.'/'.$filename, "w") or die("Unable to open file!");
            fwrite($myfile, $z);
            fclose($myfile);
        }

    }

    private function makeModel($tablename){
        if($tablename=='')return;

        $arr=explode('_',$tablename);
        $z=file_get_contents('./template/model.txt');
        $z=str_replace('{dir}',$arr[1],$z);
        $z=str_replace('{class}',$arr[2],$z);
        $z=str_replace('{tablename}',$tablename,$z);
        $dir='../models/'.$arr[1];
        $filename=$arr[2].'.php';
        if(!is_dir($dir)){
            mkdir($dir);
        }
        if(!file_exists($dir.'/'.$filename)){
            $myfile = fopen($dir.'/'.$filename, "w") or die("Unable to open file!");
            fwrite($myfile, $z);
            fclose($myfile);
        }


    }

    private function makeFactory($tablename,$module){
        if(empty($tablename)||empty($module))return;

        $arr=explode('_',$tablename);
        $one=$arr[1];
        $two=$arr[2];
        $z=file_get_contents('./template/factory.txt');
        $z=str_replace('{dir}',$one,$z);
        $z=str_replace('{class}',ucfirst($two).'Factory',$z);
        $z=str_replace('{tablename}',$one.$two,$z);
        $z=str_replace('{subdir}',$two,$z);
        $z=str_replace('{module}',$module,$z);


        $dir='../modules/'.$module.'/factory/'.$one;
        $filename=ucfirst($two).'Factory.php';
        if(!is_dir($dir)){
            mkdir($dir);
        }
        if(!file_exists($dir.'/'.$filename)){
            $myfile = fopen($dir.'/'.$filename, "w") or die("Unable to open file!");
            fwrite($myfile, $z);
            fclose($myfile);
        }
    }

    public function makeform($tablename,$module,$method){
        if($tablename==''|| $method=='' || $module=='')return;

        $arr=explode('_',$tablename);
        $one=$arr[1];
        $two=$arr[2];
        $z=file_get_contents('./template/'.$method.'form.txt');
        $z=str_replace('{module}',$module,$z);
        $z=str_replace('{one}',$one,$z);
        $z=str_replace('{two}',$two,$z);
        $z=str_replace('{tablename_noprefix}',$one.'_'.$two,$z);

        $dir_one='../modules/'.$module.'/forms/'.$one;
        $dir_two=$dir_one.'/'.$two;

        $filename=ucfirst($method).'Form.php';
        if(!is_dir($dir_one)){
            mkdir($dir_one);
        }
        if(!is_dir($dir_two)){
            mkdir($dir_two);
        }

        if(!file_exists($dir_two.'/'.$filename)){
            $myfile = fopen($dir_two.'/'.$filename, "w") or die("Unable to open file!");
            fwrite($myfile, $z);
            fclose($myfile);
        }
    }





}
