<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/8
 * Time: 16:04.
 */

namespace InsideAPI\Enum;

class EPlatform
{
    // 百度
    const Baidu = 0;
    // 奇搜360
    const Qh360 = 1;
    // 搜狗
    const Sogou = 2;
    // 神马
    const Shenma = 3;
    // 腾讯
    const Tencent = 4;
    // 微信
    const Weixin = 5;

    public static function getPlatform($key = null)
    {
        $all = [
            0 => '百度',
            1 => '360',
            2 => '搜狗',
            3 => '神马',
            4 => '腾讯',
            5 => '微信',
        ];
        if (array_key_exists($key, $all)) {
            return $all[$key];
        }

        return $all;
    }
}
