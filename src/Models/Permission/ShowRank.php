<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27.
 */

namespace InsideAPI\Models\Permission;

class ShowRank extends PermissionDetails
{
    public $IR; // 是否有查看排名功能

    public function attributes()
    {
        return [
            'IR' => (bool) $this->IR,
        ];
    }
}
