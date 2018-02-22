<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:25
 */

namespace InsideAPI\User;

use InsideAPI\Core\AbstractAPI;

class User extends AbstractAPI
{
    const GET_INFO = 'https://api.xiaolutuiguang.com/api/insideuser/getinfo';

    const EDIT = 'https://api.xiaolutuiguang.com/api/insideuser/edit';

    const EDIT_PWD = 'https://api.xiaolutuiguang.com/api/insideuser/editpwd';

    const EDIT_MAIL = 'https://api.xiaolutuiguang.com/api/insideuser/editemail';

    const EDIT_MOBILE = 'https://api.xiaolutuiguang.com/api/insideuser/editmobile';


    const GET_PERMISSIONS = 'https://api.xiaolutuiguang.com/api/insideuser/getpermissions';

    const GET_PERMISSIONS_ALL = 'https://api.xiaolutuiguang.com/api/insideuser/getpermissionsall';

    const GET_ACC_LIST = 'https://api.xiaolutuiguang.com/api/insideuser/acclist';

    const GET_ACC_LIST_HISTORY = 'https://api.xiaolutuiguang.com/api/insideuser/acclisthistory';

    const ACC_ADD = 'https://api.xiaolutuiguang.com/api/insideuser/accadd';

    const ACC_ADDS = 'https://api.xiaolutuiguang.com/api/insideuser/accadds';

    const ACC_EDIT = 'https://api.xiaolutuiguang.com/api/insideuser/accedit';

    const ACC_DELETE = 'https://api.xiaolutuiguang.com/api/insideuser/accdelete';



    /**
     * 获取用户信息 -- Done
     * @param array $params
     * @return string
     */
    public function getInfo($params = [])
    {
        return $this->parseJSON(static::POST,[self::GET_INFO,$params]);
    }

    /**
     * 编辑用户信息 --Done
     * @param $params
     * @return string
     */
    public function edit($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT,$params]);
    }


    /**
     * 编辑用户信息 修改密码 --Done
     * @param $params = []
     * @return string
     */
    public function editPwd($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_PWD,$params]);
    }

    /**
     * 编辑用户信息 修改手机号码--Done
     * @param $params = []
     * @return string
     */
    public function editMobile($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_MOBILE,$params]);
    }


    /**
     * 编辑用户信息 修改邮箱--Done
     * @param $params = []
     * @return string
     */
    public function editEmail($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_MAIL,$params]);
    }

    /**
     * 获取用户权限  ---Done
     * @param array $pros
     * @param int $AgentID
     * @return string
     */
    public function getPermissions($pros =[],$AgentID = 0)
    {
        $params = [
            'AgentID' => $AgentID,
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST,[self::GET_PERMISSIONS,$params]);
    }

    public function getProducts($pros =[],$AgentID = 0)
    {
        $params = [
            'AgentID' => $AgentID,
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST,[self::GET_PERMISSIONS_ALL,$params]);
    }

    /**
     * 获取账户列表  ---Done
     * @param array $pros
     * @return string
     */
    public function getAccList($pros = [])
    {
        $params = [
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST,[self::GET_ACC_LIST,$params]);
    }

    /**
     * 获取历史删除账户列表
     * @param array $pros
     * @return string
     */
    public function getAccListHistory($pros = [])
    {
        $params = [
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST,[self::GET_ACC_LIST_HISTORY,$params]);
    }



    /**
     * 添加账户 ---Done
     * @param $params = []
     * @return string
     */
    public function accAdd($params = [])
    {
//        $params = [
//            'Platform' => $userAcc->Platform,
//            'PT' => $userAcc->PT,
//            'AccID' => $userAcc->AccID,
//            'AccName' => $userAcc->AccName,
//            'LName' => $userAcc->LName,
//            'Pwd' => $userAcc->Pwd,
//        ];

        return $this->parseJSON(static::POST,[self::ACC_ADD,$params]);
    }

    /**
     * 批量添加账户
     * @param array $params
     * @return string
     */
    public function accAdds($params =[])
    {
        return $this->parseJSON(static::POST,[self::ACC_ADDS,$params]);
    }

    /**
     * 编辑账户信息
     * @param $params = []
     * @return string
     */
    public function accEdit($params = [])
    {
//        $params = [
//            'Platform' => $userAcc->Platform,
//            'PT' => $userAcc->PT,
//            'AccID' => $userAcc->AccID,
//            'AccName' => $userAcc->AccName,
//            'LName' => $userAcc->LName,
//            'Pwd' => $userAcc->Pwd,
//        ];
        return $this->parseJSON(static::POST,[self::ACC_EDIT,$params]);
    }

    /**
     * 删除账户
     * $params = [
     *  'Platform' => $userAcc->Platform,
     *  'PT' => $userAcc->PT,
     *  'AccID' => $userAcc->AccID,
     * ];
     * @param $params = [] 平台ID
     * @return string
     */
    public function accDelete($params = [])
    {
        return $this->parseJSON(static::POST,[self::ACC_DELETE,$params]);
    }
}