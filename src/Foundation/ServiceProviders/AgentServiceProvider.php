<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:23
 */

namespace InsideAPI\Foundation\ServiceProviders;


use InsideAPI\Agent\Agent;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AgentServiceProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['agent'] = function ($container) {
            return new Agent();
        };
    }
}