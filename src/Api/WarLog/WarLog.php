<?php

namespace ClashOfClans\Api\WarLog\WarClan;

use ClashOfClans\Api\AbstractResource;

/**
 * @method string result()
 * @method string endTime()
 * @method int teamSize()
 * @method WarClan clan()
 * @method WarClan opponent()
 */
class WarLog extends AbstractResource
{
    protected $casts = [
        'clan' => WarClan::class,
        'opponent' => WarClan::class,
    ];
}

?>
