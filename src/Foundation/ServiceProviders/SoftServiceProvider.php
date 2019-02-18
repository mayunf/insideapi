<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Soft\Soft;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SoftServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['soft'] = function ($container) {
            return new Soft($container['access_token']);
        };
    }
}
