<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/9
 * Time: 14:02
 */

namespace app\modules\v1\service\model;


class UpdateService
{
    public static $map=[
        'user'=> 'app\models\AdminUser',
        'usergroup'=> 'app\models\AdminUserGroup',
        'auth'=> 'app\models\AdminAuth',
        'groupauth'=> 'app\models\AdminGroupAuth',
        'group'=> 'app\models\AdminGroup',
        'menu'=> 'app\models\AdminMenu',
        'menugroup'=> 'app\models\AdminMenuGroup',
    ];
    /*
     * @param model在上面的map中
     * @param id 0表示新增 其他为更新
     * @param id 0表示新增 其他为更新
     *
     * */
    public static function run($modelName,$idNum,$idName,$postdata){
        $clz=self::$map[$modelName];

        $model=$clz::findOne($idNum);

        foreach ($postdata as $k=>$v){
            if($k==$idName){

                continue;
            }

            $model->$k=$v;


        }

        $model->save();


    }
}