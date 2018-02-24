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

class UserTest extends TestCase
{

    public function testConfig()
    {
        $options = [
            'debug'     => true,
            'token'    => 'token',
            'access_key'    => 'access_key',
            'log' => [
                'file' => 'C:\tmp\inside.log'
            ],
            'guzzle' => [
                'timeout' => 3.0, // 超时时间（秒）
                'verify' => false, // 关掉 SSL 认证
            ],
        ];
        $this->assertEmpty([]);
        return $options;
    }

    /**
     * @depends testConfig
     * @param array $options
     * @return  array
     */
    public function testLogin(array $options)
    {
        $app = new Application($options);
        $service = $app->user_not_login->logon('-------','-------');
        $_SESSION['Accesstoken'] = $service['Body']['Accesstoken'];
        $_SESSION['SessionID'] = $service['Body']['SessionID'];
        $_SESSION['UserId'] = $service['Body']['UserId'];
        $this->assertTrue($service->Success);
    }

    /**
     * @depends testConfig
     * @depends testLogin
     * @param array $options
     * @return  array
     */
    public function testGetInfo($options)
    {
        $app = new Application($options);
        $result = $app->user->getInfo();
        $this->assertTrue($result->Success);
    }

    /**
     * @depends testConfig
     * @depends testLogin
     * @param array $options
     * @return  array
     */
    public function testIsMobile($options)
    {
        $app = new Application($options);
        $result = $app->user->getProducts();
        $this->assertTrue($result->Success);
    }

}