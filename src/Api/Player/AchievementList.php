<?php

namespace ClashOfClans\Api\Player;

use ClashOfClans\Api\AbstractResource;

/**

 */
class AchievementList extends AbstractResource
{
	protected $casts = [
		'all' => Achievement::class
	];
	
	/**
     * @return array
     */
    public function all()
    {
        return $this->get();
    }
}