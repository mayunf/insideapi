<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/23
 * Time: 14:41
 */

namespace InsideAPI\Tests\User;


use InsideAPI\Foundation\Application;
use PHPUnit\Framework\TestCase;

class UserNotLoginTest extends TestCase
{
    public function testLogin()
    {
        $options = [
            'debug'     => true,
            'token'    => 'token',
            'access_key'    => 'access_key',
            'guzzle' => [
                'timeout' => 3.0, // 超时时间（秒）
                'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
            ],
        ];
        $app = new Application($options);
        $service = $app->user_not_login;
        $result = $service->logon('******','******');
//        var_dump($result);
        $this->assertTrue($result->Success);
    }
}