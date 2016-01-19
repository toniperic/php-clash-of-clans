<?php

use ToniPeric\Clash\Clan;
use ToniPeric\Clash\Http\Client;

class ClanTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Clan
     */
    private $clan;

    function setUp()
    {
        $this->clan = Client::getClanDetails('#2VP0J0VV');
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_a_name()
    {
        $this->assertEquals('Hattrickers', $this->clan->name());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_level()
    {
        $this->assertEquals(8, $this->clan->level());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_points()
    {
        $this->assertEquals(22094, $this->clan->points());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_a_description()
    {
        $this->assertEquals('klan za one 18+', $this->clan->description());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_members()
    {
        $this->assertInstanceOf('ToniPeric\\Clash\\Members', $this->clan->members());
        $this->assertEquals(35, $this->clan->size());
        $this->assertCount(35, $this->clan->members());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_minimum_required_trophies()
    {
        $this->assertEquals(800, $this->clan->requiredTrophies());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_a_tag()
    {
        $this->assertEquals('#2VP0J0VV', $this->clan->tag());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_join_type()
    {
        $this->assertEquals('inviteOnly', $this->clan->type());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_war_frequency()
    {
        $this->assertEquals('always', $this->clan->warFrequency());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_war_wins()
    {
        $this->assertEquals(169, $this->clan->warWins());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_has_clan_badge_image()
    {
        $this->assertArrayHasKey('clanBadgeImg', $this->clan->data());
    }
}
