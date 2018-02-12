<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/15
 * Time: 15:18
 */

namespace InsideAPI\Core;

use Psr\Http\Message\RequestInterface;

abstract class AbstractAPI extends BaseApi
{
    /**
     * 注册中间件
     */
    protected function registerHttpMiddlewares()
    {
        // after login
        $this->http->addMiddleware($this->sessionIdMiddleware());
        // log
        $this->http->addMiddleware($this->logMiddleware());
    }

    protected function sessionIdMiddleware()
    {
        return function (callable $handler) {
          return function (RequestInterface $request, array $options) use ($handler) {
              $request = $request->withHeader('token',ApiConfig::TOKEN);
              $request = $request->withHeader('accesstoken',ApiConfig::getAccessToken());
              $request = $request->withHeader('Cookie','JWSEMID='.ApiConfig::getSessionID());
              return $handler($request, $options);
          };
        };
    }

}