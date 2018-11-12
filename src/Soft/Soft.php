<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/10/12
 * Time: 14:45
 */

namespace InsideAPI\Soft;


use InsideAPI\Core\BaseApi;

class Soft extends BaseApi
{

    const CONFIG_CLEAR = 'InsideSoft/ConfigClear/'; // 清除config 缓存

    const ABOUT_CLEAR = 'InsideSoft/aboutclear/'; // 清除about 缓存

    /**
     * 清除config的cache
     * @param $type
     * @return \InsideAPI\Support\Collection
     */
    public function configClear($type)
    {
        return $this->parseJSON(static::POST, [self::CONFIG_CLEAR.$type, []]);
    }


    /**
     * 清除about缓存
     * @param integer $proId 产品ID
     * @return \InsideAPI\Support\Collection
     */
    public function aboutClear($proId)
    {
        return $this->parseJSON(static::POST,[self::ABOUT_CLEAR.$proId,[]]);
    }
}
