<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/9
 * Time: 14:02
 */

namespace app\modules\v1\service\model;


class AddService
{
    public static $map=[
        'user'=> 'app\models\AdminUser',
        'usergroup'=>'app\models\UserGroup',
        'auth'=> 'app\models\AdminAuth',
        'groupauth'=> 'app\models\AdminGroupAuth',
        'admingroup'=> 'app\models\AdminGroup',
        'menu'=> 'app\models\AdminMenu',
        'menugroup'=>'app\models\MenuGroup',
    ];
    /*
     * @param model在上面的map中
     * @param id 0表示新增 其他为更新
     * @param id 0表示新增 其他为更新
     *
     * */
    public static function run($modelName,$postdata,$postwhere,$otherdata){
        $clz=self::$map[$modelName];

        $model=new $clz();
        foreach ($postdata as $k=>$v){
            $model->$k=$v;
            foreach ($postwhere as $m=>$n){
                if($k==$m){
                    $model->$m=$n;
                    continue;
                }
            }

        }

        foreach ($otherdata as $m=>$n){
            $model->$m=$n;
        }
        $model->save();


    }
}