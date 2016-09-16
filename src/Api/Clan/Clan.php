<?php

namespace ClashOfClans\Api\Clan;

use ClashOfClans\Api\AbstractResource;
use ClashOfClans\Api\Location\Location;

/**
 * @method string name()
 * @method string tag()
 * @method string type()
 * @method Location location()
 * @method string warFrequency()
 * @method int clanLevel()
 * @method int warWins()
 * @method int clanPoints()
 * @method MemberList memberList()
 * @method int rank()
 * @method int previousRank()
 */
class Clan extends AbstractResource
{

    protected $casts = [
        'location' => Location::class,
        'badgeUrls' => Badge::class,
        'memberList' => MemberList::class
    ];

    /**
     * @return Badge|null
     */
    public function badge()
    {
        return $this->get('badgeUrls');
    }

    public function membersCount()
    {
        return $this->get('members');
    }
}
