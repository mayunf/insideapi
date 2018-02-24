<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 16:47
 */

namespace InsideAPI\Foundation\ServiceProviders;


use InsideAPI\User\UserNotLogin;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class UserNotLoginServiceProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['user_not_login'] = function ($container) {
            return new UserNotLogin($container['access_token']);
        };
    }
}