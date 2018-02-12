# insideapi 为公司内部使用
> 仅作内部项目使用，非内部人员请忽视

##安装##
    composer require mayunfeng/insideapi
##使用##
    $service = new UserService();
    $result = $service->addUser();
    if($result['Success']){
        // do something
    } else {
        // do something
    }