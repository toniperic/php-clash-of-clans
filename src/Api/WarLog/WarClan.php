
<?php

namespace ClashOfClans\Api\WarLog;

use ClashOfClans\Api\AbstractResource;
use ClashOfClans\Api\Clan\Badge;

/**
 * @method string name()
 * @method string tag()
 * @method int clanLevel()
 * @method int attacks()
 * @method int stars()
 * @method int expEarned()
 */
class WarClan extends AbstractResource
{
    protected $casts = [
        'badgeUrls' => Badge::class,
    ];
    
    /**
     * @return Badge|null
     */
    public function badge()
    {
        return $this->get('badgeUrls');
    }
   
}

?>
