<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 14:04.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Per\Per;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['per'] = function ($container) {
            return new Per($container['access_token']);
        };
    }
}
