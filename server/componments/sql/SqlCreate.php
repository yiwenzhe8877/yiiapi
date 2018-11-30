<?php

namespace app\componments\sql;

use app\componments\utils\ApiException;
use app\componments\utils\Assert;
use app\componments\utils\Filter;

class SqlCreate
{
    private  $_map=[
        "admin_auth"=>'app\models\admin\auth',
	"admin_group"=>'app\models\admin\group',
	"admin_groupauth"=>'app\models\admin\groupauth',
	"admin_menu"=>'app\models\admin\menu',
	"admin_menugroup"=>'app\models\admin\menugroup',
	"admin_operatorlogs"=>'app\models\admin\operatorlogs',
	"admin_user"=>'app\models\admin\user',
	"api_exceptionlog"=>'app\models\api\exceptionlog',
	"api_log"=>'app\models\api\log',
	"apitest_usercase"=>'app\models\apitest\usercase',
	"article_article"=>'app\models\article\article',
	"article_category"=>'app\models\article\category',
	"common_district"=>'app\models\common\district',
	"common_dlycorp"=>'app\models\common\dlycorp',
	"common_setting"=>'app\models\common\setting',
	"freight_template"=>'app\models\freight\template',
	"goods_category"=>'app\models\goods\category',
	"goods_goods"=>'app\models\goods\goods',
	"goods_label"=>'app\models\goods\label',
	"goods_logs"=>'app\models\goods\logs',
	"goods_models"=>'app\models\goods\models',
	"goods_product"=>'app\models\goods\product',
	"member_address"=>'app\models\member\address',
	"member_baseinfo"=>'app\models\member\baseinfo',
	"member_cart"=>'app\models\member\cart',
	"member_comment"=>'app\models\member\comment',
	"member_consult"=>'app\models\member\consult',
	"member_evaluat"=>'app\models\member\evaluat',
	"member_favorite"=>'app\models\member\favorite',
	"member_footprint"=>'app\models\member\footprint',
	"member_group"=>'app\models\member\group',
	"member_loginlog"=>'app\models\member\loginlog',
	"member_money"=>'app\models\member\money',
	"member_msg"=>'app\models\member\msg',
	"member_point"=>'app\models\member\point',
	"member_profile"=>'app\models\member\profile',
	"member_sysmsg"=>'app\models\member\sysmsg',
	"member_verify"=>'app\models\member\verify',
	"order_base"=>'app\models\order\base',
	"order_delivery"=>'app\models\order\delivery',
	"order_deliveryitems"=>'app\models\order\deliveryitems',
	"order_downloadlog"=>'app\models\order\downloadlog',
	"order_items"=>'app\models\order\items',
	"order_log"=>'app\models\order\log',
	"order_payments"=>'app\models\order\payments',
	"order_pmt"=>'app\models\order\pmt',
	"order_refunds"=>'app\models\order\refunds',
	"order_remark"=>'app\models\order\remark',
	"order_selllogs"=>'app\models\order\selllogs',
	"order_tag"=>'app\models\order\tag',
	"store_auth"=>'app\models\store\auth',
	"store_group"=>'app\models\store\group',
	"store_groupauth"=>'app\models\store\groupauth',
	"store_menu"=>'app\models\store\menu',
	"store_menugroup"=>'app\models\store\menugroup',
	"store_operatorlogs"=>'app\models\store\operatorlogs',
	"store_setting"=>'app\models\store\setting',
	"store_store"=>'app\models\store\store',
	"store_user"=>'app\models\store\user',
	
    ];
    private $_tableName='';
    private $_data=[];
    private $_coverData=[];
    private $_unsavefields=[];

    /**
     * @return array
     */
    public function getUnsavefields()
    {
        return $this->_unsavefields;
    }

    /**
     * @param array $unsavefields
     */
    public function setUnsavefields($unsavefields)
    {
        $this->_unsavefields = $unsavefields;
    }

    /**
     * @return array
     */
    public function getMap()
    {
        return $this->_map;
    }

    /**
     * @param array $map
     */
    public function setMap($map)
    {
        $this->_map = $map;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->_tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        $this->_tableName = $tableName;
    }



    /**
     * @return array
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    /**
     * @return array
     */
    public function getCoverData()
    {
        return $this->_coverData;
    }

    /**
     * @param array $coverData
     */
    public function setCoverData($coverData)
    {
        $this->_coverData = $coverData;
    }


    /*
     * @param model在上面的map中
     * @param id 0表示新增 其他为更新
     * @param id 0表示新增 其他为更新
     *
     * */
    public  function run(){
        Assert::isEmpty(['表名'=>$this->getTableName(),'数据'=>$this->getData()]);

        $clz=$this->getMap()[$this->getTableName()];

        $model=new $clz();

        foreach ($this->getData() as $k=>$v){
            if(in_array($k,$this->getUnsavefields())){
                continue;
            }

            $model->$k=Filter::sqlinject($v);
        }

        foreach ($this->getCoverData() as $m=>$n){
            $model->$m=Filter::sqlinject($n);
        }

        return $model->save();
    }
}