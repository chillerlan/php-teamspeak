<?php
/**
 * Class TS3Config
 *
 * @filesource   TS3Config.php
 * @created      09.10.2016
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

use chillerlan\Traits\ContainerAbstract;

/**
 * @property string $host
 * @property int    $port
 * @property int    $vserver
 * @property string $query_user
 * @property string $query_password
 * @property string $storagedir
 * @property string $filename
 * @property string $apiversion
 */
class TS3Config extends ContainerAbstract{
	use TS3ConfigTrait;
}
