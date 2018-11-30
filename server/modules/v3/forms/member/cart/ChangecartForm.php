<?php

namespace app\modules\v3\forms\member\cart;

use app\componments\common\CommonForm;
use app\componments\sql\SqlCreate;
use app\componments\sql\SqlUpdate;
use app\componments\utils\ApiException;
use app\models\api\member\baseinfo\MemberBaseinfoApi;
use app\models\api\store\user\StoreUserApi;
use app\models\goods\goods;
use app\models\member\cart;


class ChangecartForm extends CommonForm
{
    public $product_id;
    public $goods_id;
    public $num;


    public function addRule(){
        return [
            [["product_id","goods_id","num"],'required','message'=>'{attribute}不能为空'],
        ];
    }

    public function run($form){


        $cart=cart::find()
            ->andWhere(['=','member_id',MemberBaseinfoApi::getUid()])
            ->andWhere(['=','product_id',$form->product_id])
            ->one();
        if($cart->num+$form->num<1){
            return "";
        }

        $obj=new SqlUpdate();
        $obj->setTableName('member_cart');
        $obj->setData(['num'=>$form->num]);
        $obj->setWhere(['member_id='=>MemberBaseinfoApi::getUid(),' and product_id='=>$form->product_id]);

        return $obj->changeonefield();

    }
}