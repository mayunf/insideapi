<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/15
 * Time: 15:18.
 */

namespace InsideAPI\Core;

use GuzzleHttp\Middleware;
use InsideAPI\AccessToken\AccessToken;
use Mayunfeng\Supports\Collection;
use Mayunfeng\Supports\Log;
use Psr\Http\Message\RequestInterface;

/**
 * BaseApi use before login
 * Class BaseApi.
 */
abstract class AbstractAPI
{
    const POST = 'post';

    const GET = 'get';

    public $accessToken;

    /** @var Http */
    protected $http;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Return the http instance.
     *
     * @return Http
     */
    public function getHttp()
    {
        if (is_null($this->http)) {
            $this->http = new Http();
        }

        if (count($this->http->getMiddlewares()) === 0) {
            $this->registerHttpMiddlewares();
        }

        return $this->http;
    }

    /**
     * Set the http instance.
     *
     * @param Http $http
     *
     * @return $this
     */
    public function setHttp(Http $http)
    {
        $this->http = $http;

        return $this;
    }

    /**
     * 注册中间件.
     */
    protected function registerHttpMiddlewares()
    {
        // log
        $this->http->addMiddleware($this->logMiddleware());

        // after login
        if ($this->accessToken->getUserId() > 0) {
            $this->http->addMiddleware($this->sessionIdMiddleware());
        }
    }

    protected function sessionIdMiddleware()
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $request = $request->withHeader('Cookie', 'JWSEMID=' . $this->accessToken->getSessionID());

                return $handler($request, $options);
            };
        };
    }

    /**
     * Log the request.
     *
     * @return \Closure
     */
    protected function logMiddleware()
    {
        return Middleware::tap(function (RequestInterface $request, $options) {
            Log::debug("请求: {$request->getMethod()} {$request->getUri()} " . json_encode(array_merge($options, [
                    'Sid' => $this->accessToken->getSessionId()
                ])));
//            Log::debug('请求头:'.json_encode($request->getHeaders()));
        });
    }

    /**
     * Parse JSON from response and check error.
     *
     * @param string $method
     * @param array $args
     *
     * @return Collection
     */
    public function parseJSON($method, array $args)
    {
        $http = $this->getHttp();

        $contents = $http->parseJSON(call_user_func_array([$http, $method], $args));

        if (isset($contents['body']) && !empty($contents['body'])) {
            $contents['body'] = \GuzzleHttp\json_decode($contents['body'], true);
        }

        $contents = $this->checkAndThrow($contents);

        return new Collection($contents);
    }

    /**
     * @param array $contents
     *
     * @return array
     */
    protected function checkAndThrow(array $contents)
    {
        return $contents;
    }
}
