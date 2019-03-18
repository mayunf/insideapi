<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 16:23
 */
namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Mobj\Mobj;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class MobjServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['mobj'] = function ($container) {
            return new Mobj($container['access_token']);
        };
    }
}