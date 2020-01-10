<?php

namespace InsideAPI\Group;

use InsideAPI\Core\AbstractAPI;

class Group extends AbstractAPI
{
    const USER_INVITE_INFO = 'ins/v2/group/GroupUserInviteInfo';

    const USER_INVITE_ADD = 'ins/v2/group/GroupUserInviteAdd';

    public function userInviteInfo($inviteId)
    {
        return $this->parseJSON(static::POST, [
            self::USER_INVITE_INFO,
            [
                'InviteId'   => $inviteId,
            ],
        ]);
    }

    /**
     * @param $inviteId
     * @param $code
     * @param string $m
     * @param string $un
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function userInviteAdd($inviteId, $code, $m = '', $un = '')
    {
        return $this->parseJSON(static::POST, [
            self::USER_INVITE_ADD,
            [
                'InviteId'   => $inviteId,
                'UName'      => $un,
                'Mobile'     => $m,
                'Code'       => $code,
            ],
        ]);
    }
}
