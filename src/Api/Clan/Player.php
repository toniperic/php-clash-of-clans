<?php


namespace ClashOfClans\Api\Clan;


use ClashOfClans\Api\AbstractResource;
use ClashOfClans\Api\League\League;

/**
 * @method string name()
 * @method string role()
 * @method int expLevel()
 * @method League league()
 * @method int trophies()
 * @method int clanRank()
 * @method int previousClanRank()
 * @method int donations()
 * @method int donationsReceived()
 * @method Clan clan()
 */
class Player extends AbstractResource
{
    protected $casts = [
        'league' => League::class,
        'clan' => Clan::class
    ];

    public function isLeader()
    {
        return $this->role() === 'leader';
    }

    public function isCoLeader()
    {
        return $this->role() === 'coLeader';
    }

    public function isElder()
    {
        return $this->role() === 'admin';
    }
}
