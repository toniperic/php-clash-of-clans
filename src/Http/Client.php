<?php

namespace ToniPeric\Clash\Http;

use ToniPeric\Clash\Clan;

class Client
{
    public static $apiUrl = 'https://set7z18fgf.execute-api.us-east-1.amazonaws.com/prod/';

    public static function search($name)
    {
        $results = self::get(self::$apiUrl.'?route=getClanSearch&name='.urlencode($name));

        return $results['clanSearch']['results'];
    }

    public static function getClanDetails($tag)
    {
        $results = self::get(self::$apiUrl.'?route=getClanDetails&clanTag='.urlencode($tag));

        $results = $results['clanDetails']['results'];

        return new Clan($results);
    }

    protected static function get($url)
    {
        $response = file_get_contents($url);

        return json_decode($response, true);
    }
}
