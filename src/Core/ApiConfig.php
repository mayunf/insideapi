<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/21
 * Time: 20:39
 */

namespace InsideAPI\Core;

/**
 * API 请求配置文件
 * Class ApiConfig
 * @package common\library\api\core
 */
class ApiConfig
{

    const HOST = 'https://api.xiaolutuiguang.com/'; //API 地址

    const TOKEN = 'be2afba3752a67c8'; // 访问token

    const ACCESS_KEY = 'aefcca4c17bf1f8d'; // 初始access_token

    const ACCESS_TOKEN_PARAMS = 'Accesstoken';

    const SESSION_ID_PARAMS = 'SessionID';

    const USER_ID = 'UserId';

    protected static $AccessToken; //临时请求密钥

    protected static $SessionId; //SessionID

    protected static $UserId; //UserId

    /**
     * 获取 SessionID
     * @return mixed
     */
    public static function getSessionID()
    {
        return session(self::SESSION_ID_PARAMS);
//        return \Yii::$app->getSession()->get(self::SESSION_ID_PARAMS);
    }

    /**
     * 设置SessionID
     * @param $sessionID
     */
    public static function setSessionID($sessionID)
    {
        session([self::SESSION_ID_PARAMS=>$sessionID]);
//        \Yii::$app->getSession()->set(self::SESSION_ID_PARAMS,$sessionID);
    }

    /**
     * 获取 AccessToken
     * @return mixed
     */
    public static function getAccessToken()
    {
        return session(self::ACCESS_TOKEN_PARAMS);
//        return \Yii::$app->getSession()->get(self::ACCESS_TOKEN_PARAMS);
    }

    /**
     * 设置 AccessToken
     * @param $accessToken
     */
    public static function setAccessToken($accessToken)
    {
        session([self::ACCESS_TOKEN_PARAMS=>$accessToken]);
//        \Yii::$app->getSession()->set(self::ACCESS_TOKEN_PARAMS,$accessToken);
    }


    /**
     * 获取 UserId
     * @return mixed
     */
    public static function getUserId()
    {
        return session(self::USER_ID);
//        return \Yii::$app->getSession()->get(self::USER_ID);
    }

    /**
     * 设置 UserId
     * @param $userId
     */
    public static function setUserId($userId)
    {
        session([self::USER_ID=>$userId]);
//        \Yii::$app->getSession()->set(self::USER_ID,$userId);
    }

}