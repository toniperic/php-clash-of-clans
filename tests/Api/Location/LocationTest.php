<?php


use ClashOfClans\Api\Location\Location;

class LocationTest extends PHPUnit_Framework_TestCase
{

    public function testCannotInstantiateExternally()
    {
        $reflection = new ReflectionClass(Location::class);

        $this->assertFalse($reflection->getConstructor()->isPublic());
    }

    public function testItInstantiatesItselfFromArray()
    {
        $this->assertInstanceOf(Location::class, Location::makeFromArray([]));
    }

    public function testItProperlyAssignsPropertiesDuringInstantiation()
    {
        $location = Location::makeFromArray([
            'id' => 32000066,
            'name' => 'Croatia',
            'countryCode' => 'HR',
            'isCountry' => true
        ]);

        $this->assertEquals('Croatia', $location->name());
        $this->assertEquals(32000066, $location->id());
        $this->assertEquals(true, $location->isCountry());
        $this->assertEquals('HR', $location->countryCode());
    }

    public function testItReturnsNullForCountryCodeWhenNotCountry()
    {
        $location = Location::makeFromArray([
            'id' => 32000006,
            'name' => 'International',
            'isCountry' => false
        ]);

        $this->assertEquals(false, $location->isCountry());
        $this->assertNull($location->countryCode());
    }

}
