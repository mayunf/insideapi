<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 18:22
 */

namespace InsideAPI\Models\Permission;


abstract class PermissionDetails
{

    public function formatData(array $array)
    {
        foreach ($array as $key=> $value){
            if (property_exists($this,$key)) {
                $this->$key = $value;
            }
        }
        return $this->attributes();
    }

    // 子类实现此方法用来返回标准数据
    abstract public function attributes();
}