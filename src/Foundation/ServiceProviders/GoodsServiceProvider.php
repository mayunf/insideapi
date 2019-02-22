<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Goods\Goods;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GoodsServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['goods'] = function ($container) {
            return new Goods($container['access_token']);
        };
    }
}
