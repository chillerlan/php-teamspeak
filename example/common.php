<?php
/**
 *
 * @filesource   common.php
 * @created      12.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\TeamspeakExample;

require_once __DIR__.'/../vendor/autoload.php';

use chillerlan\Teamspeak\TS3Client;
use chillerlan\Teamspeak\TS3Config;
use chillerlan\Traits\DotEnv;

(new DotEnv(__DIR__.'/../config', '.env'))->load();

$ts3config = new TS3Config;

$ts3config->host           = getenv('TS3_HOST');
$ts3config->port           = getenv('TS3_PORT');
$ts3config->vserver        = getenv('TS3_VSERVER');
$ts3config->query_user     = getenv('TS3_QUERY_USER');
$ts3config->query_password = getenv('TS3_QUERY_PASS');

$ts3 = new TS3Client($ts3config);
$ts3->connect();
