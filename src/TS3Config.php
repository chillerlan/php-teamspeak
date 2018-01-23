<?php
/**
 *
 * @filesource   TS3Config.php
 * @created      09.10.2016
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

/**
 * Class TS3Config
 */
class TS3Config{

	public $host = 'localhost';
	public $port = 10011;
	public $vserver = 1;
	public $query_user;
	public $query_password;

	public $storagedir = __DIR__.'/../storage/';
	public $filename = 'ts3help';
	public $apiversion = '3.0.13.6';
}
