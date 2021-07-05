<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Account\Account;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AccountServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['account'] = function ($container) {
            return new Account($container['access_token']);
        };
    }
}
