<?php
/**
 * @filesource   create_interface.php
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

$version = explode(' ', $ts3->send('serverinfo')->parse_kv()->virtualserver_version)[0];

$helpfile = __DIR__.'/../storage/ts3help-'.$version.'.json';

$methodlist = is_file($helpfile)
	? json_decode(file_get_contents($helpfile))
	: require_once __DIR__.'/create_help.php';

$interface = '<?php
/**
 * Interface TS3QueryInterface
 *
 * auto generated for documentation purposes
 *
 * @version      '.$version.'
 *
 * @filesource   TS3QueryInterface.php
 * @created      '.date('d.m.Y').'
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

/**
 *
 */
interface TS3QueryInterface{'.PHP_EOL;

foreach($methodlist as $method){

	$interface .= '
	/**
	 * '.ucfirst($method->command).'
	 *
	 * '.$method->shortdesc.'
	 *
	 * Description:';

	foreach(explode(PHP_EOL, wordwrap($method->description, 100, PHP_EOL)) as $line){
		$interface .= '
	 *   '.$line;
	}

	if(!empty($method->permissions)){
		$interface .= '
	 *
	 * Permissions:';

		sort($method->permissions);

		foreach($method->permissions as $perm){
			$interface .= '
	 *   - '.$perm;
		}

	}

	$interface .= '
	 *
	 * Usage: 
	 *     '.$method->usage.'
	 *
	 * Example: 
	 *   - Request: 
	 *         '.$method->example->request;

	if(!empty($method->example->response)){
		$interface .= '
	 *   - Response:
	 *         '.$method->example->response;
	}


	$interface .= '
	 *';

	$args = '';
	if(!empty($method->params)){

		$interface .= '
	 * @param array $params';

		foreach($method->params as $p){
			$interface .= '
	 *   - '.$p->name.(!is_null($p->value) ? ' ('.$p->value.')' :  ' [optional]');

			$args .= '\''.$p->name.'\''.(!is_null($p->value) ? ' => \''.$p->value.'\'' : '').', ';

		}

	}

	$m = $method->command.'('.(!empty($args) ? '$params = ['.trim($args, ', ').']' : '').')';

	$interface .= '
	 *
	 * @return '.(is_null($method->example->response) ? 'void' : '\chillerlan\Teamspeak\TS3Response').'
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function '.$m.(is_null($method->example->response) ? '' : ':TS3Response').';
';
	echo ' * @method '.(is_null($method->example->response) ? 'void       ' : 'TS3Response').' '.$m.PHP_EOL;
}

$interface .= '
}'.PHP_EOL;

$fh = fopen(__DIR__.'/../src/TS3QueryInterface.php', 'w');

fwrite($fh, $interface);
fclose($fh);
