<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/4/20
 * Time: 10:57.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Admin\Admin;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AdminServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['admin'] = function ($container) {
            return new Admin($container['access_token']);
        };
    }
}
