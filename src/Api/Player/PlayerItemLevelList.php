<?php

namespace ClashOfClans\Api\Player;

use ClashOfClans\Api\AbstractResource;

/**
 * @method string name()
 * @method int stars()
 * @method int value()
 * @method int target()
 * @method string completionInfo()
 */
class PlayerItemLevelList extends AbstractResource
{
	protected $casts = [
		'all' => PlayerItemLevel::class
	];
	
	/**
	* @return array
	*/
	public function all()
	{
		return $this->get();
	}
}
