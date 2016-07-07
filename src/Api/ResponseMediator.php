<?php

namespace ClashOfClans\Api;

use GuzzleHttp\Psr7\Response;

class ResponseMediator
{

    public static function convertResponseToArray(Response $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
