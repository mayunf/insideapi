<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/11/27
 * Time: 14:33.
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
//    protected $endpointGetToken = 'https://api.xiaolutuiguang.com/api/user/logon';
    protected $endpointGetToken = 'ins/v2/user/logon';

    public $baseUri = '';
    /** @var CacheInterface */
    protected $cache;

    //访问token
    public $sessionKey = 'SID';
    public $userIdKey = 'Uid';
    protected $cachePrefix = 'insideapi.access_token.';
    protected $userId = 0;
    protected $sessionId;

    protected $ttl = 7200;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->cache = $this->app['config']['cache'];
        $this->setUserId($this->app['config']['user_id'] ?? 0);
        if ($this->getUserId() > 0) {
            // 已经登录用户 从缓存中获取token信息
            $this->setSessionId($this->getSessionId());
        }
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
     * Get session id.
     *
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->getCache()->get($this->cachePrefix.$this->sessionKey.$this->userId);
    }

    /**
     * Set session id.
     *
     * @param $sessionId
     */
    public function setSessionId($sessionId)
    {
        $cacheKey = $this->cachePrefix.$this->sessionKey.$this->userId;

        $this->sessionId = $this->getCache()->set($cacheKey, $sessionId, $this->ttl);
    }

    protected function getCacheKey()
    {
        return $this->cachePrefix;
    }

    /**
     * 获取token.
     *
     * @param string $un  用户名
     * @param string $pwd 密码
     * @param int    $pt  产品类型
     * @param int    $t   用户类型
     *
     * @throws HttpException
     *
     * @return array 返回数组
     */
    public function getToken(string $un, string $pwd, int $pt = 200, int $t = 0): array
    {
        $cacheKey = $this->getCacheKey();
        $cache = $this->getCache();
        if ($cache->has($cacheKey)) {
            return $cache->get($cacheKey);
        }
        $token = $this->requestToken([
            'PT'  => $pt,
            'T'   => $t,
            'UN'  => $un,
            'Pwd' => $pwd,
        ]);
        $this->setToken($token);

        return $token;
    }

    /**
     * Set token.
     *
     * @param $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->setUserId($token[$this->userIdKey]);
        $this->setSessionId($token[$this->sessionKey]);

        return $this;
    }

    public function removeToken()
    {
        $this->cache->delete($this->getSessionId());
    }

    public function requestToken(array $arguments): array
    {
        $response = $this->sendRequest($arguments);

        $token = json_decode($response['body'], true);

        if (empty($token[$this->sessionKey]) || empty($token[$this->userIdKey])) {
            throw new HttpException('Request access_token fail:'.json_encode($response, JSON_UNESCAPED_UNICODE));
        }

        return $token;
    }

    protected function sendRequest($arguments)
    {
        return $this->post($this->app['config']['guzzle']['base_uri'].$this->endpointGetToken,
            [
                'data' => json_encode($arguments, JSON_UNESCAPED_UNICODE),
            ]
        );
    }

    /**
     * Get cache instance.
     *
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
     * Set default cache.
     *
     * @return FilesystemCache
     */
    private function createDefaultCache()
    {
        return new FilesystemCache();
    }
}
