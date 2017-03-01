<?php

namespace ClashOfClans\Api\Player;

use ClashOfClans\Api\AbstractResource;
use ClashOfClans\Api\League\League;
use ClashOfClans\Api\Clan\Clan;

/**
 * @method string tag()
 * @method string name()
 * @method int expLevel()
 * @method League league()
 * @method int trophies()
 * @method int attackWins()
 * @method int defenseWins()
 * @method Clan clan()
 * @method int bestTrophies()
 * @method int donations()
 * @method int donationsReceived()
 * @method int warStars()
 * @method string role()
 * @method int townHallLevel()
 * @method AchievementList achievements()
 * @method PlayerItemLevelList troops()
 * @method PlayerItemLevelList heroes()
 * @method PlayerItemLevelList spells()

 */
/*
  "legendStatistics": {
    "legendTrophies": 0,
    "currentSeason": {
      "rank": 0,
      "trophies": 0,
      "id": "string"
    },
    "previousSeason": {
      "rank": 0,
      "trophies": 0,
      "id": "string"
    },
    "bestSeason": {
      "rank": 0,
      "trophies": 0,
      "id": "string"
    }
  },
  */
 
class Player extends AbstractResource
{
    protected $casts = [
        'league' => League::class,
        'clan' => Clan::class,
        'spells' => PlayerItemLevelList::class,
        'heroes' => PlayerItemLevelList::class,
        'troops' => PlayerItemLevelList::class,
		'achievements' => AchievementList::class
    ];
    
}

