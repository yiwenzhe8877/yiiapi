<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/15
 * Time: 20:29
 */

namespace app\componments\utils;


class MapUtils
{
    private  $map=[
        'wrong_format_phone'=>"手机号格式错误",
    ];

    /**
     * @return array
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param array $map
     */
    public function setMap($map)
    {
        $this->map = $map;
    }

}