<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 14:00
 */
namespace InsideAPI\Per;

use InsideAPI\Core\AbstractAPI;
use InsideAPI\Enum\ELogonType;
use InsideAPI\Enum\EPlatform;
use InsideAPI\Enum\EProductType;

class Per extends AbstractAPI
{
    const PER_BY_ID = 'ins/v2/per/perbyid'; // 根据权限Id获取权限

    const PER_BY_UID = 'ins/v2/per/perbyuid'; //根据用户Id获取权限

    const ACC_PER_ADD = 'ins/v2/per/accperadd'; //  添加用户产品账户权限


    /**
     * 根据权限Id获取权限
     *
     * @param string $Perid 权限id
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function PerById(string $Perid)
    {
        return $this->parseJSON(static::POST, [
            self::PER_BY_ID,
            [
                'Perid'  => $Perid,
            ],
        ]);
    }

 /**
 * 根据用户Id获取权限
 *@param array $Proids    产品id
 * @param int    $uid     用户ID
 *{"Proids":[117],"Uid":13}
 * @return \Mayunfeng\Supports\Collection
 */
    public function PerByUid(array $Proids , int $Uid)
    {
        return $this->parseJSON(static::POST, [
            self::PER_BY_UID,
            [
                'Uid'    => $Uid,
                'Proids' => $Proids
            ],
        ]);
    }

    /**
     *  添加用户产品账户权限
     *
     *@param int     $uid     用户ID
     *@param string  $Proid    产品id
     *@param int     $plat 平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     *@param datetime   $BDate    开始时间
     *@param datetime   $EDate    结束时间
     * @return \Mayunfeng\Supports\Collection
     */
    public function AccPerAdd(int $Uid , string $Proid , int $plat,$BDate ,$EDate  )
    {
        return $this->parseJSON(static::POST, [
            self::ACC_PER_ADD,
            [
                'Uid'      => $Uid,
                'Proid'    => $Proid,
                'Plat'     => $plat,
                'BDate'    => $BDate,
                'EDate '   => $EDate,
            ],
        ]);
    }


}