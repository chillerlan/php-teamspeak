<?php
/**
 * Trait TS3ConfigTrait
 *
 * @created      31.01.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

trait TS3ConfigTrait{

	protected string $host = 'localhost';
	protected int $port = 10011;
	protected int $vserver = 1;
	protected string $query_user;
	protected string $query_password;

}
