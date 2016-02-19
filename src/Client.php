<?php


namespace ClashOfClans;

use ClashOfClans\Api\Clan\Clan;
use ClashOfClans\Api\Clan\Player;
use ClashOfClans\Api\League\League;
use ClashOfClans\Api\Location\Location;
use ClashOfClans\Api\Location\LocationList;
use ClashOfClans\Api\ResponseMediator;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;

class Client
{
    protected $httpClient;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get full details for specific clan
     *
     * @param string $tag
     * @return Clan
     */
    public function getClan($tag)
    {
        $response = $this->request('clans/' . urlencode($tag));

        return Clan::makeFromArray($response);
    }

    /**
     * Search for clans using parameters
     * @see Documentation at https://developer.clashofclans.com/
     *
     * @param $params
     * @return array
     */
    public function getClans($params)
    {
        $params = is_array($params) ? $params : ['name' => $params];

        $response = $this->request('clans?' . http_build_query($params));

        return array_map(function($item){
            return Clan::makeFromArray($item);
        }, $response['items']);
    }

    /**
     * Get details for specific location
     * @param $id
     * @return Location
     */
    public function getLocation($id)
    {
        return Location::makeFromArray($this->request('locations/' . urlencode($id)));
    }

    /**
     * Get list of all locations
     *
     * @return array
     */
    public function getLocations()
    {
        return array_map(function($item){
            return Location::makeFromArray($item);
        }, $this->request('locations')['items']);
    }

    /**
     * Get rankings for specific location
     * @param $locationId
     * @param $rankingId
     * @return array
     */
    public function getRankingsForLocation($locationId, $rankingId)
    {
        $url = 'locations/' . $locationId . '/rankings/' . $rankingId;

        if($rankingId == 'clans'){
            return array_map(function($item){
                return Clan::makeFromArray($item);
            }, $this->request($url)['items']);
        }

        return array_map(function($item){
            return Player::makeFromArray($item);
        }, $this->request($url)['items']);
    }

    /**
     * Get all available leagues
     *
     * @return array
     */
    public function getLeagues()
    {
        return array_map(function($item){
            return League::makeFromArray($item);
        }, $this->request('leagues')['items']);
    }

    /**
     * @param $url
     * @return array
     */
    protected function request($url)
    {
        $response = $this->getHttpClient()
                         ->request('GET', $url, ['headers' => ['authorization' => 'Bearer ' . $this->getToken()]]);

        return ResponseMediator::convertResponseToArray($response);
    }

    /**
     * @return GuzzleClient
     */
    public function getHttpClient()
    {
        if($this->httpClient === null)
        {
            $this->httpClient = new GuzzleClient(['base_uri' => 'https://api.clashofclans.com/v1/']);
        }

        return $this->httpClient;
    }

    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

}
