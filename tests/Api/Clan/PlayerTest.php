<?php



use ClashOfClans\Api\Clan\Player;
use ClashOfClans\Api\League\League;

class PlayerTest extends PHPUnit_Framework_TestCase
{
    /** @var Player */
    protected $player;

    public function setUp()
    {
        $this->player = Player::makeFromArray([
            'name' => 'VanSilent',
            'role' => 'leader',
            'league' => [
                'id' => 29000016,
                'name' => 'Champions League III',
                'iconUrls' => [
                    'small' => 'small',
                    'tiny' => 'tiny',
                    'medium' => 'medium'
                ],
            'trophies' => 3405
            ]
        ]);
    }

    public function testItCastsPropertiesProperly()
    {
        $this->assertInstanceOf(League::class, $this->player->league());
        $this->assertEquals('Champions League III', $this->player->league()->name());
    }
}
