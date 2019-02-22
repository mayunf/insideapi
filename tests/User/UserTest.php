<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/12/6
 * Time: 11:37.
 */

namespace InsideAPI\Test\User;

use InsideAPI\Core\Exceptions\HttpException;
use InsideAPI\Test\TestCase;

class UserTest extends TestCase
{
    /**
     * 登录.
     *
     * @return mixed
     */
    public function testGenToken()
    {
        try {
            $res = $this->getInstance()->access_token->getToken('18888888888', '18888888888');
            $this->assertArrayHasKey('Uid', $res);

            return $res['Uid'];
        } catch (HttpException $exception) {
            $this->assertInstanceOf(HttpException::class, $exception);
        }
    }

    /**
     * @param $user_id
     * @depends testGenToken
     */
    public function testIsMobile($user_id)
    {
        $res = $this->getInstance($user_id)->user->isMobile('18888888888');
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    /**
     * @param $user_id
     * @depends testGenToken
     */
    public function testIsEmail($user_id)
    {
        $res = $this->getInstance($user_id)->user->isEmail('mayunfeng@jwsem.com2');
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    /**
     * @param $user_id
     * @depends testGenToken
     */
    public function testPulse($user_id)
    {
        $res = $this->getInstance($user_id)->user->pulse();
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    /**
     * @param $user_id
     * @depends testGenToken
     */
    public function testInfo($user_id)
    {
        $res = $this->getInstance($user_id)->user->info();
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    /**
     * @depends testGenToken
     */
    public function testSendSms()
    {
        $res = $this->getInstance()->user->sendSms('18888888888');
        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
    }

//    public function testRegister()
//    {
//        $res = $this->getInstance()->user->register('18888888888','111111');
//        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
//    }
//

}
