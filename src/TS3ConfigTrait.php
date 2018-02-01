<?php
/**
 * Trait TS3ConfigTrait
 *
 * @filesource   TS3ConfigTrait.php
 * @created      31.01.2018
 * @package      chillerlan\Teamspeak
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

trait TS3ConfigTrait{

	public $host = 'localhost';
	public $port = 10011;
	public $vserver = 1;
	public $query_user;
	public $query_password;
	public $storagedir = __DIR__.'/../storage/';
	public $filename = 'ts3help';
	public $apiversion = '3.0.13.8';

}
