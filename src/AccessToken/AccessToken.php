<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/11/27
 * Time: 14:33
 */

namespace InsideAPI\AccessToken;

use InsideAPI\Core\Exceptions\HttpException;
use Mayunfeng\Supports\Traits\HasHttpRequest;
use Pimple\Container;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\FilesystemCache;

class AccessToken
{
    use HasHttpRequest;
    /**
     * @var \Pimple\Container
     */
    protected $app;
    protected $endpointGetToken = 'https://api.xiaolutuiguang.com/api/insideuser/logon';
    public $baseToken;

    protected $cache;
    //访问token
    protected $tokenKey = 'Accesstoken';
    protected $sessionKey = 'SessionID';
    protected $userIdKey = 'UserId';
    protected $cachePrefix = 'insideapi.access_token.';

    protected $accessToken;
    protected $userId = 0;
    protected $sessionId;

    protected $ttl = 7200;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->cache = $this->app['config']['cache'];
        $this->baseToken = $this->app['config']['token'];
        $this->setAccessToken($this->app['config']['access_key']);
        $this->setUserId($this->app['config']['user_id'] ?? 0);
        if ($this->getUserId() > 0) {
            // 已经登录用户 从缓存中获取token信息
            $this->setSessionId($this->getSessionId());
            $this->setAccessToken($this->getAccessToken());
        }
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->getCache()->get($this->cachePrefix.$this->tokenKey.$this->userId);
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $cacheKey = $this->cachePrefix.$this->tokenKey.$this->userId;

        $this->accessToken = $this->getCache()->set($cacheKey,$accessToken,$this->ttl);

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId = 0)
    {
        $this->userId = $userId;
    }

    /**
     * Get session id
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->getCache()->get($this->cachePrefix.$this->sessionKey.$this->userId);
    }

    /**
     * Set session id
     * @param $sessionId
     */
    public function setSessionId($sessionId)
    {
        $cacheKey = $this->cachePrefix.$this->sessionKey.$this->userId;

        $this->sessionId = $this->getCache()->set($cacheKey,$sessionId,$this->ttl);
    }


    protected function getCacheKey()
    {
        return $this->cachePrefix;
    }

    public function setCacheKey($key)
    {
        $this->tokenKey = $key;
    }

    public function getTokenKey()
    {
        return $this->tokenKey;
    }

    public function getToken(array $arguments): array
    {
        $cacheKey = $this->getCacheKey();
        $cache = $this->getCache();
        if ($cache->has($cacheKey)) {
            return $cache->get($cacheKey);
        }
        $token = $this->requestToken($arguments);
        $this->setToken($token);
        return $token;
    }

    /**
     * Set token
     * @param $token
     * @return $this
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setToken($token)
    {
        $this->setUserId($token[$this->userIdKey]);
        $this->setSessionId($token[$this->sessionKey]);
        $this->setAccessToken($token[$this->tokenKey]);
        return $this;
    }

    public function requestToken(array $arguments): array
    {
        $response = $this->sendRequest($arguments);

        $token = json_decode($response['Body'], true);

        if (empty($token[$this->tokenKey]) || empty($token[$this->sessionKey]) || empty($token[$this->userIdKey])) {
            throw new HttpException('Request access_token fail:' . json_encode($response, JSON_UNESCAPED_UNICODE));
        }

        return $token;
    }

    protected function sendRequest($arguments)
    {
        return $this->post($this->endpointGetToken,
            [
                'data' => json_encode($arguments, JSON_UNESCAPED_UNICODE)
            ],
            [
                'headers' => [
                    'token' => $this->baseToken,
                    'accesstoken' => $this->app['config']['access_key']
                ],
            ]
        );
    }


    /**
     * Get cache instance
     * @return CacheInterface
     */
    public function getCache(): CacheInterface
    {
        if ($this->cache) {
            return $this->cache;
        }

        if (property_exists($this, 'app') && $this->app instanceof Container
            && isset($this->app['cache']) && $this->app['cache'] instanceof CacheInterface) {
            return $this->cache = $this->app['cache'];
        }

        return $this->cache = $this->createDefaultCache();
    }


    /**
     * Set default cache
     * @return FilesystemCache
     */
    private function createDefaultCache()
    {
        return new FilesystemCache();
    }
}
