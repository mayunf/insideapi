<?php

namespace InsideAPI\Group;

use InsideAPI\Core\AbstractAPI;

class Group extends AbstractAPI
{
    const USER_INVITE_INFO = 'ins/v2/group/GroupUserInviteInfo';

    const USER_INVITE_ADD = 'ins/v2/group/GroupUserInviteAdd';

    const TEAM_USER_ACCOUNT_LIST = 'ins/v2/group/GroupTeamUserAccountList';

    const GROUP_TEAM_TREE = 'ins/v2/group/GroupTeamTree';

    const GROUP_TEAM_LIST = 'ins/v2/group/GroupTeamList';

    public function groupTeamTree($gid = 2)
    {
        return $this->parseJSON(static::POST, [
            self::GROUP_TEAM_TREE,
            [
                'GId'   => $gid,
            ],
        ]);
    }

    public function groupTeamList($gid = 2,$tid = 0)
    {
        return $this->parseJSON(static::POST, [
            self::GROUP_TEAM_LIST,
            [
                'GId'   => $gid,
                'TId'   => $tid,
            ],
        ]);
    }

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

    public function teamUserAccountList(array $pararms = [])
    {
        return $this->parseJSON(static::POST, [
            self::TEAM_USER_ACCOUNT_LIST,
            $pararms,
        ]);
    }
}
