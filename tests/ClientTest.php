<?php

use ToniPeric\Clash\Http\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @test
     ** @vcr clanSearch
     */
    function it_searches_for_clans()
    {
        $results = Client::search('Hattrickers');

        $this->assertCount(1, $results);
    }

    /** @test
     ** @vcr clanDetails
     */
    function it_fetches_clan_details()
    {
        $clan = Client::getClanDetails('#2VP0J0VV');

        $this->assertNotNull($clan->data());
    }
}
