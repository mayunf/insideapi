<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23
 */

namespace InsideAPI\Foundation\ServiceProviders;


use InsideAPI\Manage\Manage;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ManageServiceProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['manage'] = function ($container) {
            return new Manage();
        };
    }
}