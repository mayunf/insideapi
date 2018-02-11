<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 18:13
 */

namespace InsideAPI\Models;

use InsideAPI\Models\Permission\PermissionDetails;
use InsideAPI\Enum\EProductType;

class AddAgentPer extends PermissionDetails
{
    public $AID;// 代理商ID
    public $AT;// 代理商类型 (0 注册用户未开通试用，1 已申请试用用户， 2 正式用户)
    public $ProId;// 产品ID
    public $PerName;// 权限名称
    public $BDate;// 开始时间
    public $EDate;// 开始时间
    public $Details;// 权限细节


    /**
     * 接收post参数，自动组装需要的数据
     * EditUserPer constructor.
     * @param $details
     * @return array
     */
    public function formatData(array $details)
    {
        foreach ($details as $key=> $value){
            if (property_exists($this,$key)) {
                $this->$key = $value;
            }
        }

        $detailModelName = EProductType::getDetailsModel($this->ProId);
        /** @var PermissionDetails $detailsModel */
        $detailsModel = new $detailModelName();
        $this->Details = $detailsModel->formatData($this->Details);
        return $this->attributes();
    }
    
    public function attributes()
    {
        return [
            'AID' => (int)$this->AID,
            'AT' => (int)$this->AT,
            'ProId' => (int)$this->ProId,
            'PerName' => $this->PerName,
            'BDate' => $this->BDate,
            'EDate' => date('Y-m-d H:i:s',strtotime($this->EDate) +3600*24-1),
            'Details' => $this->Details,
        ];
    }

}