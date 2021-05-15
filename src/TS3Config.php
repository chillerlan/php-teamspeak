<?php
/**
 * Class TS3Config
 *
 * @created      09.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

use chillerlan\Settings\SettingsContainerAbstract;

/**
 * @property string $host
 * @property int    $port
 * @property int    $vserver
 * @property string $query_user
 * @property string $query_password
 */
class TS3Config extends SettingsContainerAbstract{
	use TS3ConfigTrait;
}
