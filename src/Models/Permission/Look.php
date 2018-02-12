<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27
 */

namespace InsideAPI\Models\Permission;


class Look extends PermissionDetails
{

    public $MC; //可绑定小程序数量


    public function attributes()
    {
        return [
            'MC' => (int)$this->MC,
        ];
    }
}