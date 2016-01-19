# Clash of Clans API

[![Build Status](https://travis-ci.org/toniperic/php-clash-of-clans.svg?branch=master)](https://travis-ci.org/toniperic/php-clash-of-clans)

Easily query Supercell's API for live Clash of Clans data! Uses same source as used on official clashofclans.com website. This package is tested and working on PHP 5.4 and greater, including PHP 7.0!

## Installation
### Using Composer
```
composer require toniperic/php-clash-of-clans
```

## Usage
### Search for clans

```php
$results = Client::search('Hattrickers'); // returns array, or empty array if no matches
```

### Get specific clan details
```php
$clan = Client::getClanDetails('#2VP0J0VV');

$clan->name(); // "Hattrickers"
$clan->level(); // 8
$clan->warWins(); // 168
```

### Getting leader info
```php
$leader = $clan->members()->leader(); // returns Member object
$leader->name(); // "VanSilent"
$leader->donations(); // 3451
$leader->level(); // 118
```

### Getting co-leaders and elders
```php
$coLeaders = $clan->members()->coLeaders(); // array of Member objects
$elders = $clan->members()->elders(); // array of Member objects
```

There are many more methods, feel free to explore the API. Also feel free and welcome to contribute!
