<?php

use ToniPeric\Clash\Member;
use ToniPeric\Clash\Members;
use ToniPeric\Clash\Http\Client;

class MemberTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Members
     */
    private $members;

    function setUp()
    {
        $this->members = Client::getClanDetails('#2VP0J0VV')->members();
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_gets_top_member()
    {
        $this->assertEquals('VanSilent', $this->members->top()->name());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_gets_member_by_role()
    {
        $this->assertInstanceOf('ToniPeric\\Clash\\Member', $this->members->leader());

        $this->assertCount(3, $this->members->coLeaders());

        $this->assertCount(19, $this->members->elders());
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_gets_member_count()
    {
        $this->assertCount(35, $this->members->getMembers());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_a_name()
    {
        $this->assertEquals('VanSilent', $this->members->top()->name());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_donations()
    {
        $this->assertEquals(5840, $this->members->top()->donations());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_donations_received()
    {
        $this->assertEquals(1939, $this->members->top()->donationsReceived());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_experience_level()
    {
        $this->assertEquals(118, $this->members->top()->level());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_league_badge_images()
    {
        $this->assertArrayHasKey('leagueBadgeImg', $this->members->top()->data());

        $this->assertArrayHasKey('m', $this->members->top()->leagueBadge());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_a_previous_clan_rank()
    {
        $this->assertEquals(1, $this->members->top()->previousClanRank());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_a_role()
    {
        $this->assertEquals('leader', $this->members->top()->role());
    }

    /** @test
     ** @vcr clanDetails
     */
    function a_member_has_trophies()
    {
        $this->assertEquals(3961, $this->members->top()->trophies());
    }
}
