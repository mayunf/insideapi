<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/11
 * Time: 9:50.
 */

namespace InsideAPI\Models;

use InsideAPI\Enum\EProductType;
use InsideAPI\Models\Permission\PermissionDetails;

class AddPer extends PermissionDetails
{
    public $PerType; // 权限类型 ( 0 自定义权限, 1 免费版权限，2 系统权限)
    public $ProId; // 产品ID
    public $PerName; // 权限名称
    public $Details; // 权限名称

    /**
     * 格式化数据.
     *
     * @param $data
     *
     * @return array
     */
    public function formatData(array $data)
    {
        foreach ($data as $key=> $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        $detailModelName = EProductType::getDetailsModel($this->ProId);
        /** @var PermissionDetails $detailsModel */
        $detailsModel = new $detailModelName();
        $this->Details = $detailsModel->formatData($this->Details);

        return $this->attributes();
    }

    /**
     * 定义返回数据.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'PerType' => (int) $this->PerType,
            'ProId'   => (int) $this->ProId,
            'PerName' => $this->PerName,
            'Details' => $this->Details,
        ];
    }
}
