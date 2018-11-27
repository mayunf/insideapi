<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 16:47
 */

namespace InsideAPI\Foundation\ServiceProviders;


use InsideAPI\AccessToken\AccessToken;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AccessTokenServiceProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['access_token'] = function ($container) {
            return new AccessToken($container);
        };
    }
}
