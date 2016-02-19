<?php


use ClashOfClans\Api\Clan\Badge;
use ClashOfClans\Api\Clan\Clan;
use ClashOfClans\Api\Clan\MemberList;
use ClashOfClans\Api\Location\Location;

class ClanTest extends PHPUnit_Framework_TestCase
{
    /** @var Clan */
    protected $clan;

    public function setUp()
    {
        $this->clan = Clan::makeFromArray([
            'name' => 'Hattrickers',
            'tag' => '#2VP0J0VV',
            'location' => [
                'id' => 32000066,
                'name' => 'Croatia',
                'isCountry' => true,
                'countryCode' => 'HR'
            ],
            'badgeUrls' => [
                'small' => 'small',
                'large' => 'large',
                'medium' => 'medium'
            ],
            'memberList' => [
                ['name' => 'VanSilent'],
                ['name' => 'Reek'],
            ]
        ]);
    }
    public function testCannotInstantiateExternally()
    {
        $reflection = new ReflectionClass(Clan::class);

        $this->assertFalse($reflection->getConstructor()->isPublic());
    }

    public function testItInstantiatesItselfFromArray()
    {
        $this->assertInstanceOf(Clan::class, Clan::makeFromArray([]));
    }

    public function testItProperlyAssignsPropertiesDuringInstantiation()
    {
        $this->assertEquals('Hattrickers', $this->clan->name());
        $this->assertEquals('#2VP0J0VV', $this->clan->tag());

        $properties = [
            'name' => 'Unity Elite',
            'tag' => '#8QLQCVV9'
        ];
        $clan = Clan::makeFromArray($properties);

        $this->assertEquals('Unity Elite', $clan->name());
        $this->assertEquals('#8QLQCVV9', $clan->tag());
    }

    public function testItProperlyCastsObjectsDuringAssigningProperties()
    {
        $this->assertInstanceOf(Location::class, $this->clan->location());
        $this->assertInstanceOf(Badge::class, $this->clan->badge());
        $this->assertInstanceOf(MemberList::class, $this->clan->memberList());
    }

}
