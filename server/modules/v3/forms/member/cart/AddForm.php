<?php

namespace app\modules\v3\forms\member\cart;

use app\componments\common\CommonForm;
use app\componments\sql\SqlCreate;
use app\componments\utils\ApiException;
use app\models\api\member\baseinfo\MemberBaseinfoApi;
use app\models\api\store\user\StoreUserApi;
use app\models\goods\goods;
use app\models\member\cart;


class AddForm extends CommonForm
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

        $goods=goods::find()
            ->andWhere(['=','store_id',StoreUserApi::getLoginedStoreId()])
            ->andWhere(['=','goods_id',$form->goods_id])
            ->one();

        if(!$goods)
            ApiException::run("该商品不是该店铺的","900001");


        $one=cart::find()
            ->andWhere(['=','product_id',$form->product_id])
            ->andWhere(['=','goods_id',$form->goods_id])
            ->andWhere(['=','member_id',MemberBaseinfoApi::getUid()])
            ->one();


        if($one) return "";


        $cover=[
            'store_id'=>StoreUserApi::getLoginedStoreId(),
            'goods_id'=>$form->goods_id,
            'member_id'=>MemberBaseinfoApi::getUid()
        ];

        $obj=new SqlCreate();
        $obj->setTableName('member_cart');
        $obj->setData($form);
        $obj->setCoverData($cover);
        return $obj->run();

    }
}