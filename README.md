# insideapi 为公司内部使用 #
> 仅作内部项目使用，非内部人员请忽视

## 安装 ##

    composer require mayunfeng/insideapi
    
## 使用 ##
    
    $options = [
        'debug'     => true,
        'token'    => 'token',
        'access_key'    => 'access_key',
        'cache' => 'Doctrine\Common\Cache\RedisCache', // RedisCache 实例了 `Doctrine\Common\Cache\Cache` 接口
        'log' => [
            'level' => 'debug',
            'file'  => '/tmp/insideapi.log',
        ],
        /**
         * Guzzle 全局设置
         *
         * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
         */
        'guzzle' => [
            'timeout' => 3.0, // 超时时间（秒）
            //'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
        ],
        // ...
    ];
        
    $app = new Application($options);
    $result = $app->manage->addUser();
    if($result['Success']){
        // do something
    } else {
        // do something
    }
    
