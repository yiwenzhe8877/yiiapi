<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/9
 * Time: 14:02
 */

namespace app\modules\v1\service\sql;


class AddOrUpdateService
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
    public static function run($modelName,$id,$postdata,$postwhere,$otherdata){
        $clz=self::$map[$modelName];


        if($id==0){
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
            return;

        }
        $model=$clz::findOne($id);

        $model->save();




    }
}