<?php
/**
 * @filesource   create_help.php
 * @created      11.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\TeamspeakExample;

require_once __DIR__.'/../vendor/autoload.php';

use chillerlan\Teamspeak\TS3Client;
use chillerlan\Teamspeak\TS3Config;
use Dotenv\Dotenv;

(new Dotenv(__DIR__.'/../config', '.env'))->load();


$ts3config = new TS3Config;

$ts3config->host           = getenv('TS3_HOST');
$ts3config->port           = getenv('TS3_PORT');
$ts3config->vserver        = getenv('TS3_VSERVER');
$ts3config->query_user     = getenv('TS3_QUERY_USER');
$ts3config->query_password = getenv('TS3_QUERY_PASS');

$ts3 = new TS3Client($ts3config);
$ts3->connect();

$commands = new \stdClass;

$version = explode(' ', $ts3->send('serverinfo')->parse_kv()->virtualserver_version)[0];

$helpfile = __DIR__.'/../storage/ts3help-'.$version.'.json';

if(is_file($helpfile)){
	unlink($helpfile);
}

$help = $ts3->send('help')->data; // SEND HALP!!1

$start = array_search('Command Overview:', $help) + 1;
$count = count($help);

$_commands = [];
for($i = $start, $j = 0; $i < $count - $start; $i++, $j++){

	if(empty($help[$i])){
		break; // @codeCoverageIgnore
	}

	$cmd = explode('|', $help[$i]);

	$c = new \stdClass;

	$c->command     = trim($cmd[0]);
	$c->params      = [];
	$c->permissions = '';
	$c->shortdesc   = trim($cmd[1]);
	$c->description = '';
	$c->usage       = '';
	$c->example     = '';

	if(empty($c->command)){
		// add a continued line to the previous command's shortdesc and go on (permreset)
		$_commands[--$j]->shortdesc .= ' '. trim($cmd[1]);

		continue;
	}
	elseif($c->command === 'help'){
		continue;
	}

	$_commands[$j] = $c;

	$cmd_help = $ts3->send('help '.$c->command)->data;

	$start_permissions = array_search('Permissions:', $cmd_help);
	$start_description = array_search('Description:', $cmd_help);
	$start_example = array_search('Example:', $cmd_help);

	foreach($cmd_help as $key => $value){

		if(empty(trim($value))){
			continue;
		}

		if(trim($value) === 'error id=0 msg=ok'){
			break;
		}

		if($key === 0){
			$usage = explode(' ', $value, 2);

			if($usage[0] === 'Usage:'){
				$c->usage = $usage[1];

				$_params = explode(' ', $c->usage);
				array_shift($_params);

				$c->params = array_map(function($v){
					$p = new \stdClass;

					$p->name  = trim($v, '-[].');
					$p->value = null;

					if(strpos($p->name, '=') > 0){
						$n = explode('=', $p->name);

						$p->name  = $n[0];
						$p->value = trim($n[1], '{}.');
					}

					return $p;
				}, $_params);
			}

		}
		else if($start_permissions > 1 && $key > $start_permissions && $key < $start_description){
			$c->permissions .= ' '.trim($value);
		}
		else if($start_description > $start_permissions && $key > $start_description && $key < $start_example){
			$c->description .= ' '.trim($value);
		}
		else if($start_example > $start_description && $key > $start_example){
			$c->example .= trim($value).PHP_EOL;
		}
	}

}

foreach($_commands as $cm){
	$cm->description = trim($cm->description);
	$cm->permissions = !empty($cm->permissions)
		? explode(' ', trim($cm->permissions))
		: [];

	$ex = explode(PHP_EOL, trim($cm->example), 2);

	$example = new \stdClass;

	$example->request  = $ex[0];
	$example->response = null;

	if(isset($ex[1]) && !empty($ex[1])){
		$example->response = $ex[1];
	}

	$cm->example = $example;

	$p = [];

	foreach($cm->params as $param){
		$p[$param->name] = $param;
	}

	$cm->params = $p;

	// index by command
	$commands->{$cm->command} = $cm;
}

$fh = fopen($helpfile, 'w');

fwrite($fh, json_encode($commands, JSON_PRETTY_PRINT));
fclose($fh);

var_dump($commands);

