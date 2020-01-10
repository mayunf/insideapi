<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Group\Group;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GroupServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['group'] = function ($container) {
            return new Group($container['access_token']);
        };
    }
}
