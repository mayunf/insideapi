<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/8
 * Time: 16:04
 */

namespace InsideAPI\Enum;


class EPlatform
{

    const Baidu = 0; // 百度

    const Qh360 = 1; // 奇搜360

    const Sogou = 2; // 搜狗

    const Shenma = 3; // 神马

    const Tencent = 4; // 腾讯

    const Weixin = 5; // 微信

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
        if (array_key_exists($key,$all)) {
            return $all[$key];
        }
        return $all;
    }
}
