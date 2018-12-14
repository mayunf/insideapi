<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 16:47.
 */

namespace InsideAPI\Foundation\ServiceProviders;

use InsideAPI\Agent\AgentNotLogin;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AgentNotLoginServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['agent_not_login'] = function ($container) {
            return new AgentNotLogin($container['access_token']);
        };
    }
}
