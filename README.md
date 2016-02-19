# Clash of Clans API

[![Build Status](https://travis-ci.org/toniperic/php-clash-of-clans.svg?branch=master)](https://travis-ci.org/toniperic/php-clash-of-clans)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/toniperic/php-clash-of-clans/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/toniperic/php-clash-of-clans/?branch=master)

Easily query Supercell's API for Clash of Clans data!
This package uses official API. For more information, please visit [https://developers.clashofclans.com](https://developers.clashofclans.com)


**This package is tested and working on PHP 5.5 and greater, including PHP 7.0!**

Do note that the API might change at any given moment, as there are no stable releases yet.

## Requirements
For using this package, you need to obtain an API key at [https://developers.clashofclans.com](https://developers.clashofclans.com)

## Installation
### Using Composer
```
composer require toniperic/php-clash-of-clans=dev-master
```

## Usage
When instantiating Client, you have to provide your API key:

```php
$client = new Client('API_KEY_HERE');
```

## Clans
Refers to `/clans` endpoint from the official docs.

You can use any of the parameters specified in the official docs as keys, and the values as parameter values, likewise
```php
$client->getClans(['name' => 'Foo', 'minMembers' => 30]); // returns array of Clan objects
```
Tip: if you are only searching by clan name, you don't have to specify the array as parameter but just a simple string:
```php
$client->getClans('Foo'); // returns array of Clan objects
```

For all available parameters, please browse through the [offical docs](https://developer.clashofclans.com).



## Get specific clan by tag
Refers to `/clans/{clanTag}` endpoint from the official docs.

It's very easy to use:
```php
$clan = $client->getClan('#2VP0J0VV'); // returns Clan object

$clan->name(); // "Hattrickers"
$clan->level(); // 8
$clan->warWins(); // 168
```

For more available methods, visit `ClashOfClans\Api\Clan\Clan` class.


### Getting leader info
```php
$leader = $clan->memberList()->leader(); // returns Player
$leader->name(); // "VanSilent"
$leader->donations(); // 3451
$leader->expLevel(); // 118
$leader->trophies(); // 2548

```
For more available methods, visit `ClashOfClans\Api\Clan\Player` class.

### Getting co-leaders and elders
```php
$coLeaders = $clan->memberList()->coLeaders(); // array of Player objects
$elders = $clan->memberList()->elders(); // array of Player objects
```

## Leagues
Refers to `/leagues` endpoint from the official docs.
```php
$leagues = $client->getLeagues(); // returns array of League objects

$leagues[0]->id(); // 29000001
$leagues[0]->name(); // Bronze League III
```

## Locations
Refers to `/locations` endpoint from the official docs.

Getting all available locations is pretty easy:
```php
$client->getLocations(); // returns array of Location objects
```

### Get specific location by ID
Refers to `/locations/{locationId}` endpoint from the official docs.

```php
$location = $client->getLocation(32000066); // returns Location object

$location->name(); // Croatia
$location->countryCode(); // HR
$location->isCountry(); // true
```

### Get rankings for specific location
Refers to `/locations/{locationId}/rankings/{rankingId}` endpoint from the official docs.

```
$rankings = $client->getRankingsForLocation($locationId, 'clans'); // returns array of Clan objects

// top clan
$rankings[0]->name(); // Foobar
$rankings[0]->trophies(); // 47846
```
Instead of 'clans', as the second parameter you can also pass string `players` which will return array of Player objects.

