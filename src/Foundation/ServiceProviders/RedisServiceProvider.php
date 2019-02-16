<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23
 */

namespace InsideAPI\Foundation\ServiceProviders;


use InsideAPI\Redis\Redis;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RedisServiceProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['redis'] = function ($container) {
            return new Redis($container['access_token']);
        };
    }
}
