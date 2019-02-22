<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/12/6
 * Time: 11:45.
 */

namespace InsideAPI\Test;

use InsideAPI\Foundation\Application;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Symfony\Component\Cache\Simple\RedisCache;

class TestCase extends BaseTestCase
{
    private static $_instance;

    public function getInstance($userId = 0)
    {
//        if (!self::$_instance instanceof Application) {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $cacheDrive = new RedisCache($redis);

        self::$_instance = new Application([
                'debug'      => false,
                'token'      => 'be2afba3752a67c8',
                'access_key' => 'aefcca4c17bf1f8d',
                'guzzle'     => [
                    'timeout'  => 5.0, // 超时时间（秒）
                    'verify'   => false, // 关掉 SSL 认证（强烈不建议！！！）
                    'base_uri' => 'http://api.xiaolutuiguang.com/api/',
                ],
                'log' => [
                    'file'  => __DIR__.'/../logs/'.date('Y-m-d').'.log',
                    'level' => 'debug',
                ],
                'cache'   => $cacheDrive,
                'user_id' => $userId,
            ]);
//        }

        return self::$_instance;
    }

}
