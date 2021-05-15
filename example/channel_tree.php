<?php
/**
 * @created      13.05.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

namespace chillerlan\TeamspeakExample;

use chillerlan\Teamspeak\TS3Client;
use function str_repeat;

/** @var \chillerlan\Teamspeak\TS3Client $ts3 */

require_once __DIR__.'/common.php';

#while(true){
	echo ts3ChannelTree($ts3);

#	sleep(10);
#}

exit;

/**
 * Fetches the responses from the server and initializes the tree
 */
function ts3ChannelTree(TS3Client $ts3):string{
	$ts3->connect();

	$channels = $ts3->send('channellist')->parseList();
	$clients  = $ts3->send('clientlist')->parseList();

	return ts3RenderChannels($channels, $clients);
}

/**
 * Parses the responses
 *
 * (this is not very efficient as we loop multiple times over the same lists, but it serves the purpose)
 */
function ts3RenderChannels(array $channels, array $clients, int $cid = null, int $depth = null):string{
	$str = '';

	foreach($channels as $channel){

		if($channel->pid === null){
			$depth = 0;
		}

		if($channel->pid === $cid){
			$str .= str_repeat('  ', $depth).$channel->channel_name."\n";

			foreach($clients as $client){
				if($client->cid === $channel->cid){
					$str .= str_repeat('  ', $depth).'  - '.$client->client_nickname."\n";
				}
			}

			// parse nested channels recursively
			$str .= ts3RenderChannels($channels, $clients, $channel->cid, $depth);
		}

		$depth++;
	}

	return $str;
}
