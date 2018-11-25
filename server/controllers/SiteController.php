<?php

namespace app\controllers;

use app\componments\sql\SqlGet;
use app\componments\testapi\ApiTest;
use app\componments\utils\HttpUtils;
use app\componments\utils\RandomUtils;
use app\models\api\common\setting\CommonSettingApi;
use app\models\apitest\usercase;
use app\models\common\setting;
use yii\web\Controller;


class SiteController extends Controller
{


    public function getTestCase(){

        $config= [
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.delete',
                'data'=>[],
                'code'=>'10010001',
                'code_msg'=>'没参数'
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.delete',
                'data'=>['admin_id'=>1],
                'code'=>'0',
                'code_msg'=>'ok'
            ],


            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.update',
                'data'=>['admin_id'=>'1','group_name'=>'超级管理员'],
                'code'=>'0',
                'code_msg'=>'ok'
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.update',
                'data'=>['admin_id'=>'1','group_name'=>''],
                'code'=>'10010001',
                'code_msg'=>''
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.getlist',
                'data'=>[],
                'code'=>'10010001',
                'code_msg'=>''
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.getone',
                'data'=>['admin_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],

            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.getadmin',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.changepassword',
                'data'=>['admin_id'=>'1','password'=>'123','passwordagain'=>'123'],
                'code'=>'0',
                'code_msg'=>''
            ],

            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.changepassword',
                'data'=>['admin_id'=>'1','password'=>'123','passwordagain'=>'1233'],
                'code'=>'10040005',
                'code_msg'=>''
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.login',
                'data'=>['username'=>'admin','password'=>'123'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminuser.logout
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminuser.logout',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            //admingroup.delete
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'admingroup.delete',
                'data'=>['group_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],


            //admingroup.update
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'admingroup.update',
                'data'=>['group_id'=>'1','del'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'admingroup.update',
                'data'=>['group_id'=>'1','del'=>'1','status'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //admingroup.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'admingroup.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //admingroup.getall
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'admingroup.getall',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            //admingroup.forbid
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'admingroup.forbid',
                'data'=>['group_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminauth.delete
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminauth.delete',
                'data'=>['auth_id'=>'345'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminauth.update
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminauth.update',
                'data'=>['auth_id'=>'345','name'=>'ssss'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminauth.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminauth.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminauth.getall
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminauth.getall',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminauth.setgroupauth
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                        'service'=>'adminauth.setgroupauth',
                'data'=>['group_id'=>'1','auth_id'=>'345,346'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminauth.getgroupauthlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminauth.getgroupauthlist',
                'data'=>['pageNum'=>'1','group_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminmenu.delete
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminmenu.delete',
                'data'=>['menu_id'=>'2'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminmenu.update
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminmenu.update',
                'data'=>['menu_id'=>'59','name'=>'112','router'=>'/sdsa','pid'=>'12'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminmenu.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminmenu.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminmenu.getall
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminmenu.getall',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            //adminmenu.getmenugrouprelation
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'adminmenu.getmenugrouprelation',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            //memberbaseinfo.delete
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberbaseinfo.delete',
                'data'=>['member_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //memberbaseinfo.update
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberbaseinfo.update',
                'data'=>['member_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //memberbaseinfo.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberbaseinfo.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //memberbaseinfo.getall
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberbaseinfo.getall',
                'data'=>[],
                'code'=>'0',
                'code_msg'=>''
            ],
            //memberbaseinfo.changepassword
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberbaseinfo.changepassword',
                'data'=>['member_id'=>'1','password'=>'111','passwordagain'=>'111'],
                'code'=>'0',
                'code_msg'=>''
            ],

            //memberbaseinfo.changeriches
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberbaseinfo.changeriches',
                'data'=>['member_id'=>'1','type'=>'point','value'=>'1231'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //membergroup.update
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'membergroup.update',
                'data'=>['group_id'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //membergroup.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'membergroup.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //memberaddress.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'memberaddress.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],
            //membermsg.getlist
            [
                'token'=>'1',
                'url'=>"http://localhost/yiiapi/server/web/index.php/v1/index/index",
                'service'=>'membermsg.getlist',
                'data'=>['pageNum'=>'1'],
                'code'=>'0',
                'code_msg'=>''
            ],

        ];
        return $config;

    }


    public function actionDotest($dev='',$service='')
    {
        $config=$this->getTestCase();

        for ($i=0;$i<count($config);$i++){
            $ret=usercase::find()
                ->andWhere(['=','service',$config[$i]['service']])
                ->andWhere(['=','data',json_encode($config[$i]['data'])])
                ->andWhere(['=','code',$config[$i]['code']])
                ->one();

            if(!$ret){
                if($config[$i]['service']==$service){
                    $obj=new usercase();
                    $obj->service=$config[$i]['service'];
                    $obj->code=$config[$i]['code'];
                    $obj->url=$config[$i]['url'];
                    $obj->token=$config[$i]['token'];
                    $obj->data=json_encode($config[$i]['data']);
                    $obj->save();
                }

            }
        }



        $obj=new SqlGet();
        $obj->setTableName('apitest_usercase');
        $obj->setOrderBy('id desc');
        if(isset($service) && !empty($service)){
            $obj->setWhere(['service='=>$service]);
        }
        $list=$obj->get_all()['list'];


        return $list;
       // return ['data'=>$obj->get_all(),'token'=>$token,'url'=>$url];
    }

    public function actionIndex()
    {





        $tablename='tk_store_user';
        $module='v2';

        $this->makeApi($tablename);
        $this->makeModel($tablename);
        $this->makeFactory($tablename,$module);
        $this->makeform($tablename,$module,'add');
        $this->makeform($tablename,$module,'update');
        $this->makeform($tablename,$module,'delete');
        $this->makeform($tablename,$module,'getlist');
        $this->makeform($tablename,$module,'getall');
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
