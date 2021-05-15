<?php
/**
 * @created      12.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\TeamspeakExample;

require_once __DIR__.'/../vendor/autoload.php';

use chillerlan\DotEnv\DotEnv;
use Psr\Log\AbstractLogger;
use chillerlan\Teamspeak\{TS3Client, TS3Config};

$env = (new DotEnv(__DIR__.'/../config', '.env', false))->load();

$options = [
	'host'           => $env->TS3_HOST,
	'port'           => $env->TS3_PORT,
	'vserver'        => $env->TS3_VSERVER,
	'query_user'     => $env->TS3_QUERY_USER,
	'query_password' => $env->TS3_QUERY_PASS,
];

$options = new TS3Config($options);

$logger = new class() extends AbstractLogger{
	public function log($level, $message, array $context = []){
		echo sprintf('[%s][%s] %s', date('Y-m-d H:i:s'), substr($level, 0, 4), trim($message))."\n";
	}
};

$ts3 = new TS3Client($options, $logger);
