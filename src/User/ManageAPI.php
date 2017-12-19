<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/12/5
 * Time: 20:51
 */

namespace InsideApi\User;


use InsideApi\Core\AbstractAPI;

class ManageAPI extends AbstractAPI
{
    const ADD_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/adduserper';
    const GET_PERMISSIONS = 'https://api.xiaolutuiguang.com/api/insidemanage/getper';
    const ADD_ACC_SETTING = 'https://api.xiaolutuiguang.com/api/insidemanage/addaccsetting'; //增加用户数量


    /**
     * 添加用户权限
     * @param array $params
     * @return string
     */
    public function addUserPer($params = [])
    {
        return $this->parseJSON(static::POST,[self::ADD_USER_PER,$params]);
    }

    /**
     * 根据权限ID获取权限
     * @param $perId
     * @return string
     */
    public function getPermissions($perId)
    {
        $params = [
            'PerId' => $perId
        ];
        return $this->parseJSON(static::POST,[self::GET_PERMISSIONS,$params]);
    }

    /**
     * 增加用户设置某个平台下的账户数量
     * @param $userId
     * @param $platformId
     * @param $num
     * @return string
     */
    public function addAccSetting($userId,$platformId,$num)
    {
        $params = [
            'Userid' => $userId,
            'Platform' =>$platformId,
            'Num' => $num
        ];
        return $this->parseJSON(static::POST,[self::ADD_ACC_SETTING,$params]);
    }

}