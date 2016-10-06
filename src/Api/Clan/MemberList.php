<?php

namespace ClashOfClans\Api\Clan;

use ClashOfClans\Api\AbstractResource;

class MemberList extends AbstractResource
{

    protected $casts = [
        'all' => Player::class
    ];

    /**
     * @return Player|null
     */
    public function first()
    {
        return $this->get(0);
    }

    /**
     * @return Player|null
     */
    public function nth($i)
    {
        return $this->get($i);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->get();
    }

    /**
     * @return Player
     */
    public function leader()
    {
        $members = $this->all();

        return current(array_filter($members, function($player) {
            return $player->isLeader();
        }));
    }

    /**
     * @return array
     */
    public function elders()
    {
        $members = $this->all();

        return array_filter($members, function ($player) {
            return $player->isElder();
        });
    }

    /**
     * @return array
     */
    public function coLeaders()
    {
        $members = $this->all();

        return array_filter($members, function ($player) {
            return $player->isCoLeader();
        });
    }
}
