# insideapi 为公司内部使用 #
> 仅作内部项目使用，非内部人员请忽视

## 安装 ##

    composer require mayunfeng/insideapi
    
## 使用 ##
    
    $options = [
        'debug'     => true,
        'token'    => 'wx3cf0f39249eb0e60',
        'access_key'    => 'f1c242f4f28f735d4687abb469072a29',
        'cache' => 'Doctrine\Common\Cache\RedisCache', // RedisCache 实例了 `Doctrine\Common\Cache\Cache` 接口
        'log' => [
            'level' => 'debug',
            'file'  => '/tmp/easywechat.log',
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
        
    $service = new UserService();
    $result = $service->addUser();
    if($result['Success']){
        // do something
    } else {
        // do something
    }
    
