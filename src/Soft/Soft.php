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

    const CONFIG_CLEAR = 'http://api.xiaolutuiguang.com/api/InsideSoft/ConfigClear/';

    /**
     * 清除config的cache
     * @param $type
     * @return \InsideAPI\Support\Collection
     */
    public function configClear($type)
    {
        return $this->parseJSON(static::POST, [self::CONFIG_CLEAR.$type, []]);
    }
}
