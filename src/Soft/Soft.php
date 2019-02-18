<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/10/12
 * Time: 14:45.
 */

namespace InsideAPI\Soft;

use InsideAPI\Core\AbstractAPI;

class Soft extends AbstractAPI
{
    const CONFIG = 'v2/soft/config'; // 获取软件 Config

    const CONFIG_CLEAR = 'v2/soft/configclear'; // 删除软件 config

    const ABOUT = 'v2/soft/about'; // 获取软件 About

    const ABOUT_CLEAR = 'v2/soft/aboutclear'; // 清除about 缓存

    /**
     * 获取软件 Config.
     *
     * @param string $type
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function config(string $type)
    {
        return $this->parseJSON(static::POST, [self::CONFIG, [
            't' => $type,
        ]]);
    }

    /**
     * 清除config的cache.
     *
     * @param string $type
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function configClear(string $type)
    {
        return $this->parseJSON(static::POST, [self::CONFIG_CLEAR, [
            't' => $type,
        ]]);
    }

    /**
     * 获取软件 About.
     *
     * @param int $proId
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function about(int $proId)
    {
        return $this->parseJSON(static::POST, [self::ABOUT, [
            'proid' => $proId,
        ]]);
    }

    /**
     * 清除about缓存.
     *
     * @param int $proId
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function aboutClear(int $proId)
    {
        return $this->parseJSON(static::POST, [self::ABOUT_CLEAR, [
            'proid' => $proId,
        ]]);
    }
}
