# chillerlan/php-teamspeak

A simple TS3 query client for PHP7.4+.

[![PHP Version Support][php-badge]][php]
[![version][packagist-badge]][packagist]
[![license][license-badge]][license]
[![Scrunitizer][scrutinizer-badge]][scrutinizer]
[![Packagist downloads][downloads-badge]][downloads]<br/>
[![Continuous Integration][gh-action-badge]][gh-action]

[php-badge]: https://img.shields.io/packagist/php-v/chillerlan/php-teamspeak?logo=php&color=8892BF
[php]: https://www.php.net/supported-versions.php
[packagist-badge]: https://img.shields.io/packagist/v/chillerlan/php-teamspeak.svg?logo=packagist
[packagist]: https://packagist.org/packages/chillerlan/php-teamspeak
[license-badge]: https://img.shields.io/github/license/chillerlan/php-teamspeak.svg
[license]: https://github.com/chillerlan/php-teamspeak/blob/master/LICENSE.md
[scrutinizer-badge]: https://img.shields.io/scrutinizer/g/chillerlan/php-teamspeak.svg?logo=scrutinizer
[scrutinizer]: https://scrutinizer-ci.com/g/chillerlan/php-teamspeak
[downloads-badge]: https://img.shields.io/packagist/dt/chillerlan/php-teamspeak.svg?logo=packagist
[downloads]: https://packagist.org/packages/chillerlan/php-teamspeak/stats
[gh-action-badge]: https://github.com/chillerlan/php-teamspeak/workflows/Continuous%20Integration/badge.svg
[gh-action]: https://github.com/chillerlan/php-teamspeak/actions

# Documentation
## Installation
**requires [composer](https://getcomposer.org)**

*composer.json* (note: replace `dev-main` with a [version boundary](https://getcomposer.org/doc/articles/versions.md#summary))
```json
{
	"require": {
		"php": "^7.4 || ^8.0",
		"chillerlan/php-teamspeak": "dev-main"
	}
}
```

Profit!

## Usage
```php
use chillerlan\Teamspeak\{TS3Config, TS3Client};

$options = new TS3Config([
	'host'           => 'localhost',
	'port'           => 10011,
	'vserver'        => 1,
	'query_user'     => 'query',
	'query_password' => 'supersecretpassword',
	'minLogLevel'    => 'debug',
]);

$ts3 = new TS3Client($options);
$ts3->connect();

$serverInfo = $ts3->send('serverinfo');

var_dump($serverInfo->parseList());

$channelList = $ts3->send('channellist -topic -limits -flags -voice -icon -secondsempty');
var_dump($channelList->parseList());

$clientList = $ts3->send('clientlist -uid -away -voice -times -groups -info -icon -country');
var_dump($clientList->parseList());

// ...
```
