<?php
/**
 * Interface TS3QueryInterface
 *
 * auto generated for documentation purposes
 *
 * @version      3.0.13.8
 *
 * @filesource   TS3QueryInterface.php
 * @created      23.01.2018
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

/**
 *
 */
interface TS3QueryInterface{

	/**
	 * Banadd
	 *
	 * create a ban rule
	 *
	 * Description:
	 *   Adds a new ban rule on the selected virtual server. All parameters are optional but at least one of
	 *   the following must be set: ip, name, or uid.
	 *
	 * Permissions:
	 *   - b_client_ban_create
	 *
	 * Usage: 
	 *     banadd [ip={regexp}] [name={regexp}] [uid={clientUID}]
	 *
	 * Example: 
	 *   - Request: 
	 *         banadd ip=1.2.3.4 banreason=just\s4\sfun
	 *   - Response:
	 *         banid=1
	 *
	 * @param array $params
	 *   - ip (regexp)
	 *   - name (regexp)
	 *   - uid (clientUID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function banadd($params = ['ip' => 'regexp', 'name' => 'regexp', 'uid' => 'clientUID']):TS3Response;

	/**
	 * Banclient
	 *
	 * ban a client
	 *
	 * Description:
	 *   Bans the client specified with ID clid from the server. Please note that this will create two
	 *   separate ban rules for the targeted clients IP address and his unique identifier.
	 *
	 * Permissions:
	 *   - i_client_ban_power
	 *   - i_client_needed_ban_power
	 *
	 * Usage: 
	 *     banclient clid={clientID} [time={timeInSeconds}] [banreason={text}]
	 *
	 * Example: 
	 *   - Request: 
	 *         banclient clid=4 time=3600
	 *   - Response:
	 *         banid=2
banid=3
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *   - time (timeInSeconds)
	 *   - banreason (text)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function banclient($params = ['clid' => 'clientID', 'time' => 'timeInSeconds', 'banreason' => 'text']):TS3Response;

	/**
	 * Bandel
	 *
	 * delete a ban rule
	 *
	 * Description:
	 *   Deletes the ban rule with ID banid from the server.
	 *
	 * Permissions:
	 *   - b_client_ban_delete
	 *   - b_client_ban_delete_own
	 *
	 * Usage: 
	 *     bandel banid={banID}
	 *
	 * Example: 
	 *   - Request: 
	 *         bandel banid=3
	 *
	 * @param array $params
	 *   - banid (banID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function bandel($params = ['banid' => 'banID']);

	/**
	 * Bandelall
	 *
	 * delete all ban rules
	 *
	 * Description:
	 *   Deletes all active ban rules from the server.
	 *
	 * Permissions:
	 *   - b_client_ban_delete
	 *
	 * Usage: 
	 *     bandelall
	 *
	 * Example: 
	 *   - Request: 
	 *         bandelall
	 *
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function bandelall();

	/**
	 * Banlist
	 *
	 * list ban rules on a virtual server
	 *
	 * Description:
	 *   Displays a list of active bans on the selected virtual server.
	 *
	 * Permissions:
	 *   - b_client_ban_list
	 *
	 * Usage: 
	 *     banlist
	 *
	 * Example: 
	 *   - Request: 
	 *         banlist
	 *   - Response:
	 *         banid=7 ip=1.2.3.4 created=1259444002242 invokername=Sven invokercldbid=56 invokeruid=oHhi9WzXLNEFQOwAu4JYKGU+C+c= reason enforcements=0
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function banlist():TS3Response;

	/**
	 * Bindinglist
	 *
	 * list IP addresses used by the server instance
	 *
	 * Description:
	 *   Displays a list of IP addresses used by the server instance on multi-homed machines. If no subsystem
	 *   is specified, "voice" is used by default.
	 *
	 * Permissions:
	 *   - b_serverinstance_binding_list
	 *
	 * Usage: 
	 *     bindinglist [subsystem={voice|query|filetransfer}]
	 *
	 * Example: 
	 *   - Request: 
	 *         bindinglist
	 *   - Response:
	 *         ip=0.0.0.0|ip=0::0
	 *
	 * @param array $params
	 *   - subsystem (voice|query|filetransfer)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function bindinglist($params = ['subsystem' => 'voice|query|filetransfer']):TS3Response;

	/**
	 * Channeladdperm
	 *
	 * assign permission to channel
	 *
	 * Description:
	 *   Adds a set of specified permissions to a channel. Multiple permissions can be added by providing the
	 *   two parameters of each permission. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channeladdperm cid={channelID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         channeladdperm cid=16 permid=17276 permvalue=50|permid=21415 permvalue=20
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channeladdperm($params = ['cid' => 'channelID', 'permid' => 'permID']);

	/**
	 * Channelclientaddperm
	 *
	 * assign permission to channel-client combi
	 *
	 * Description:
	 *   Adds a set of specified permissions to a client in a specific channel. Multiple permissions can be
	 *   added by providing the three parameters of each permission. A permission can be specified by permid
	 *   or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channelclientaddperm cid={channelID} cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelclientaddperm cid=12 cldbid=3 permid=17276 permvalue=50|permid=21415 permvalue=20
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cldbid (clientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelclientaddperm($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID']);

	/**
	 * Channelclientdelperm
	 *
	 * remove permission from channel-client combi
	 *
	 * Description:
	 *   Removes a set of specified permissions from a client in a specific channel. Multiple permissions can
	 *   be removed at once. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channelclientdelperm cid={channelID} cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelclientdelperm cid=12 cldbid=3 permid=17276|permid=21415
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cldbid (clientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelclientdelperm($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID']);

	/**
	 * Channelclientpermlist
	 *
	 * list channel-client specific permissions
	 *
	 * Description:
	 *   Displays a list of permissions defined for a client in a specific channel.
	 *
	 * Permissions:
	 *   - b_virtualserver_channelclient_permission_list
	 *
	 * Usage: 
	 *     channelclientpermlist cid={channelID} cldbid={clientDBID} [-permsid]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelclientpermlist cid=12 cldbid=3
	 *   - Response:
	 *         cid=12 cldbid=3 permid=4353 permvalue=1 permnegated=0 permskip=0|permid=17276 permvalue=50 permnegated=0 permskip=0|permid=21415 ...
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cldbid (clientDBID)
	 *   - permsid [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelclientpermlist($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID', 'permsid']):TS3Response;

	/**
	 * Channelcreate
	 *
	 * create a channel
	 *
	 * Description:
	 *   Creates a new channel using the given properties and displays its ID. Note that this command accepts
	 *   multiple properties which means that you're able to specifiy all settings of the new channel at
	 *   once. For detailed information, see Channel Properties.
	 *
	 * Permissions:
	 *   - b_channel_create_child
	 *   - b_channel_create_modify_with_codec_celtmono48
	 *   - b_channel_create_modify_with_codec_speex16
	 *   - b_channel_create_modify_with_codec_speex32
	 *   - b_channel_create_modify_with_codec_speex8
	 *   - b_channel_create_permanent
	 *   - b_channel_create_semi_permanent
	 *   - b_channel_create_temporary
	 *   - b_channel_create_with_default
	 *   - b_channel_create_with_description
	 *   - b_channel_create_with_maxclients
	 *   - b_channel_create_with_maxfamilyclients
	 *   - b_channel_create_with_needed_talk_power
	 *   - b_channel_create_with_password
	 *   - b_channel_create_with_sortorder
	 *   - b_channel_create_with_topic
	 *   - i_channel_create_modify_with_codec_latency_factor_min
	 *   - i_channel_create_modify_with_codec_maxquality
	 *   - i_channel_max_depth
	 *   - i_channel_min_depth
	 *
	 * Usage: 
	 *     channelcreate channel_name={channelName} [channel_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelcreate channel_name=My\sChannel channel_topic=My\sTopic
	 *   - Response:
	 *         cid=16
	 *
	 * @param array $params
	 *   - channel_name (channelName)
	 *   - channel_properties [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelcreate($params = ['channel_name' => 'channelName', 'channel_properties']):TS3Response;

	/**
	 * Channeldelete
	 *
	 * delete a channel
	 *
	 * Description:
	 *   Deletes an existing channel by ID. If force is set to 1, the channel will be deleted even if there
	 *   are clients within. The clients will be kicked to the default channel with an appropriate reason
	 *   message.
	 *
	 * Permissions:
	 *   - b_channel_delete_flag_force
	 *   - b_channel_delete_permanent
	 *   - b_channel_delete_semi_permanent
	 *   - b_channel_delete_temporary
	 *
	 * Usage: 
	 *     channeldelete cid={channelID} force={1|0}
	 *
	 * Example: 
	 *   - Request: 
	 *         channeldelete cid=16 force=1
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - force (1|0)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channeldelete($params = ['cid' => 'channelID', 'force' => '1|0']);

	/**
	 * Channeldelperm
	 *
	 * remove permission from channel
	 *
	 * Description:
	 *   Removes a set of specified permissions from a channel. Multiple permissions can be removed at once.
	 *   A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channeldelperm cid=123 [permid={permID}...] [permsid={permName}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         channeldelperm cid=16 permid=17276|permid=21415
	 *
	 * @param array $params
	 *   - cid (123)
	 *   - permid (permID)
	 *   - permsid (permName)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channeldelperm($params = ['cid' => '123', 'permid' => 'permID', 'permsid' => 'permName']);

	/**
	 * Channeledit
	 *
	 * change channel properties
	 *
	 * Description:
	 *   Changes a channels configuration using given properties. Note that this command accepts multiple
	 *   properties which means that you're able to change all settings of the channel specified with cid at
	 *   once. For detailed information, see Channel Properties.
	 *
	 * Permissions:
	 *   - b_channel_create_modify_with_codec_celtmono48
	 *   - b_channel_create_modify_with_codec_maxquality
	 *   - b_channel_create_modify_with_codec_speex16
	 *   - b_channel_create_modify_with_codec_speex32
	 *   - b_channel_create_modify_with_codec_speex8
	 *   - b_channel_modify_codec
	 *   - b_channel_modify_codec_latency_factor
	 *   - b_channel_modify_codec_quality
	 *   - b_channel_modify_description
	 *   - b_channel_modify_make_codec_encrypted
	 *   - b_channel_modify_make_default
	 *   - b_channel_modify_make_permanent
	 *   - b_channel_modify_make_semi_permanent
	 *   - b_channel_modify_make_temporary
	 *   - b_channel_modify_maxclients
	 *   - b_channel_modify_maxfamilyclients
	 *   - b_channel_modify_name
	 *   - b_channel_modify_needed_talk_power
	 *   - b_channel_modify_parent
	 *   - b_channel_modify_password
	 *   - b_channel_modify_sortorder
	 *   - b_channel_modify_topic
	 *   - i_channel_max_depth
	 *   - i_channel_min_depth
	 *   - i_channel_modify_power
	 *   - i_channel_needed_modify_power
	 *
	 * Usage: 
	 *     channeledit cid={channelID} [channel_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         channeledit cid=15 channel_codec_quality=3 channel_description=My\sDescription
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - channel_properties [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channeledit($params = ['cid' => 'channelID', 'channel_properties']);

	/**
	 * Channelfind
	 *
	 * find channel by name
	 *
	 * Description:
	 *   Displays a list of channels matching a given name pattern.
	 *
	 * Permissions:
	 *   - b_virtualserver_channel_search
	 *
	 * Usage: 
	 *     channelfind pattern={channelName}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelfind pattern=default
	 *   - Response:
	 *         cid=15 channel_name=Default\sChannel
	 *
	 * @param array $params
	 *   - pattern (channelName)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelfind($params = ['pattern' => 'channelName']):TS3Response;

	/**
	 * Channelgroupadd
	 *
	 * create a channel group
	 *
	 * Description:
	 *   Creates a new channel group using a given name and displays its ID. The optional type parameter can
	 *   be used to create template groups. For detailed information, see Definitions.
	 *
	 * Permissions:
	 *   - b_virtualserver_channelgroup_create
	 *
	 * Usage: 
	 *     channelgroupadd name={groupName} [type={groupDbType}]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgroupadd name=Channel\sAdmin
	 *   - Response:
	 *         cgid=13
	 *
	 * @param array $params
	 *   - name (groupName)
	 *   - type (groupDbType)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgroupadd($params = ['name' => 'groupName', 'type' => 'groupDbType']):TS3Response;

	/**
	 * Channelgroupaddperm
	 *
	 * assign permission to channel group
	 *
	 * Description:
	 *   Adds a set of specified permissions to a channel group. Multiple permissions can be added by
	 *   providing the two parameters of each permission. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channelgroupaddperm cgid={groupID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgroupaddperm cgid=13 permid=17276 permvalue=50|permid=21415 permvalue=20
	 *
	 * @param array $params
	 *   - cgid (groupID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgroupaddperm($params = ['cgid' => 'groupID', 'permid' => 'permID']);

	/**
	 * Channelgroupclientlist
	 *
	 * find channel groups by client ID
	 *
	 * Description:
	 *   Displays all the client and/or channel IDs currently assigned to channel groups. All three
	 *   parameters are optional so you're free to choose the most suitable combination for your
	 *   requirements.
	 *
	 * Permissions:
	 *   - b_virtualserver_channelgroup_client_list
	 *
	 * Usage: 
	 *     channelgroupclientlist [cid={channelID}] [cldbid={clientDBID}]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgroupclientlist cid=2 cgid=9
	 *   - Response:
	 *         cid=2 cldbid=9 cgid=9|cid=2 cldbid=24 cgid=9|cid=2 cldbid=47 cgid=9
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cldbid (clientDBID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgroupclientlist($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID']):TS3Response;

	/**
	 * Channelgroupcopy
	 *
	 * copy a channel group
	 *
	 * Description:
	 *   Creates a copy of the channel group specified with scgid. If tcgid is set to 0, the server will
	 *   create a new group. To overwrite an existing group, simply set tcgid to the ID of a designated
	 *   target group. If a target group is set, the name parameter will be ignored. The type parameter can
	 *   be used to create template groups. For detailed information, see Definitions.
	 *
	 * Permissions:
	 *   - b_virtualserver_channelgroup_create
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *
	 * Usage: 
	 *     channelgroupcopy scgid={sourceGroupID} tsgid={targetGroupID}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgroupcopy scgid=4 tcgid=0 name=My\sGroup\s(Copy) type=1
	 *   - Response:
	 *         cgid=33
	 *
	 * @param array $params
	 *   - scgid (sourceGroupID)
	 *   - tsgid (targetGroupID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgroupcopy($params = ['scgid' => 'sourceGroupID', 'tsgid' => 'targetGroupID']):TS3Response;

	/**
	 * Channelgroupdel
	 *
	 * delete a channel group
	 *
	 * Description:
	 *   Deletes a channel group by ID. If force is set to 1, the channel group will be deleted even if there
	 *   are clients within.
	 *
	 * Permissions:
	 *   - b_virtualserver_channelgroup_delete
	 *
	 * Usage: 
	 *     channelgroupdel cgid={groupID} force={1|0}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgroupdel cgid=13
	 *
	 * @param array $params
	 *   - cgid (groupID)
	 *   - force (1|0)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgroupdel($params = ['cgid' => 'groupID', 'force' => '1|0']);

	/**
	 * Channelgroupdelperm
	 *
	 * remove permission from channel group
	 *
	 * Description:
	 *   Removes a set of specified permissions from the channel group. Multiple permissions can be removed
	 *   at once. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channelgroupdelperm cgid={groupID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgroupdelperm cgid=16 permid=17276|permid=21415
	 *
	 * @param array $params
	 *   - cgid (groupID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgroupdelperm($params = ['cgid' => 'groupID', 'permid' => 'permID']);

	/**
	 * Channelgrouplist
	 *
	 * list channel groups
	 *
	 * Description:
	 *   Displays a list of channel groups available on the selected virtual server.
	 *
	 * Permissions:
	 *   - b_serverinstance_modify_templates
	 *   - b_virtualserver_channelgroup_list
	 *
	 * Usage: 
	 *     channelgrouplist
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgrouplist
	 *   - Response:
	 *         cgid=1 name=Channel\sAdmin type=2 iconid=100 savedb=1|cgid=2 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgrouplist():TS3Response;

	/**
	 * Channelgrouppermlist
	 *
	 * list channel group permissions
	 *
	 * Description:
	 *   Displays a list of permissions assigned to the channel group specified with cgid. If the -permsid
	 *   option is specified, the output will contain the permission names instead of the internal IDs.
	 *
	 * Permissions:
	 *   - b_virtualserver_channelgroup_permission_list
	 *
	 * Usage: 
	 *     channelgrouppermlist cgid={groupID} [-permsid]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgrouppermlist cgid=13
	 *   - Response:
	 *         permid=8470 permvalue=1 permnegated=0 permskip=0|permid=8475 permvalue=1 ...
	 *
	 * @param array $params
	 *   - cgid (groupID)
	 *   - permsid [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgrouppermlist($params = ['cgid' => 'groupID', 'permsid']):TS3Response;

	/**
	 * Channelgrouprename
	 *
	 * rename a channel group
	 *
	 * Description:
	 *   Changes the name of a specified channel group.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *
	 * Usage: 
	 *     channelgrouprename cgid={groupID} name={groupName}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelgrouprename cgid=13 name=New\sName
	 *
	 * @param array $params
	 *   - cgid (groupID)
	 *   - name (groupName)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelgrouprename($params = ['cgid' => 'groupID', 'name' => 'groupName']);

	/**
	 * Channelinfo
	 *
	 * display channel properties
	 *
	 * Description:
	 *   Displays detailed configuration information about a channel including ID, topic, description, etc.
	 *   For detailed information, see Channel Properties.
	 *
	 * Permissions:
	 *   - b_channel_info_view
	 *
	 * Usage: 
	 *     channelinfo cid={channelID}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelinfo cid=1
	 *   - Response:
	 *         channel_name=Default\sChannel channel_topic=Default\sChannel\shas\sno\s[b]topic[\/b] channel_description=This\sis\sthe\sdefault\schannel ...
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelinfo($params = ['cid' => 'channelID']):TS3Response;

	/**
	 * Channellist
	 *
	 * list channels on a virtual server
	 *
	 * Description:
	 *   Displays a list of channels created on a virtual server including their ID, order, name, etc. The
	 *   output can be modified using several command options.
	 *
	 * Permissions:
	 *   - b_virtualserver_channel_list
	 *
	 * Usage: 
	 *     channellist [-topic] [-flags] [-voice] [-limits] [-icon] [-secondsempty]
	 *
	 * Example: 
	 *   - Request: 
	 *         channellist -topic
	 *   - Response:
	 *         cid=15 pid=0 channel_order=0 channel_name=Default\sChannel channel_topic=Default\sChannel\shas\sno\s[b]topic[\/b] total_clients=2|cid=16 ...
	 *
	 * @param array $params
	 *   - topic [optional]
	 *   - flags [optional]
	 *   - voice [optional]
	 *   - limits [optional]
	 *   - icon [optional]
	 *   - secondsempty [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channellist($params = ['topic', 'flags', 'voice', 'limits', 'icon', 'secondsempty']):TS3Response;

	/**
	 * Channelmove
	 *
	 * move channel to new parent
	 *
	 * Description:
	 *   Moves a channel to a new parent channel with the ID cpid. If order is specified, the channel will be
	 *   sorted right under the channel with the specified ID. If order is set to 0, the channel will be
	 *   sorted right below the new parent.
	 *
	 * Permissions:
	 *   - b_channel_modify_parent
	 *   - b_channel_modify_sortorder
	 *   - i_channel_max_depth
	 *   - i_channel_min_depth
	 *
	 * Usage: 
	 *     channelmove cid={channelID} cpid={channelParentID}
	 *
	 * Example: 
	 *   - Request: 
	 *         channelmove cid=16 cpid=1 order=0
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cpid (channelParentID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelmove($params = ['cid' => 'channelID', 'cpid' => 'channelParentID']);

	/**
	 * Channelpermlist
	 *
	 * list channel specific permissions
	 *
	 * Description:
	 *   Displays a list of permissions defined for a channel.
	 *
	 * Permissions:
	 *   - b_virtualserver_channel_permission_list
	 *
	 * Usage: 
	 *     channelpermlist cid={channelID} [-permsid]
	 *
	 * Example: 
	 *   - Request: 
	 *         channelpermlist cid=2
	 *   - Response:
	 *         cid=2 permid=4353 permvalue=1 permnegated=0 permskip=0|permid=17276 permvalue=50 ...
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - permsid [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function channelpermlist($params = ['cid' => 'channelID', 'permsid']):TS3Response;

	/**
	 * Clientaddperm
	 *
	 * assign permission to client
	 *
	 * Description:
	 *   Adds a set of specified permissions to a client. Multiple permissions can be added by providing the
	 *   three parameters of each permission. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     clientaddperm cldbid={clientDBID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientaddperm cldbid=16 permid=17276 permvalue=50 permskip=1|permid=21415 permvalue=20 permskip=0
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientaddperm($params = ['cldbid' => 'clientDBID', 'permid' => 'permID']);

	/**
	 * Clientdbdelete
	 *
	 * delete client database properties
	 *
	 * Description:
	 *   Deletes a clients properties from the database.
	 *
	 * Permissions:
	 *   - b_client_delete_dbproperties
	 *
	 * Usage: 
	 *     clientdbdelete cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientdbdelete cldbid=56
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientdbdelete($params = ['cldbid' => 'clientDBID']);

	/**
	 * Clientdbedit
	 *
	 * change client database properties
	 *
	 * Description:
	 *   Changes a clients settings using given properties. For detailed information, see Client Properties.
	 *
	 * Permissions:
	 *   - b_client_modify_dbproperties
	 *   - b_client_modify_description
	 *   - b_client_set_talk_power
	 *
	 * Usage: 
	 *     clientdbedit cldbid={clientDBID} [client_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientdbedit cldbid=56 client_description=Best\sguy\sever!
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *   - client_properties [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientdbedit($params = ['cldbid' => 'clientDBID', 'client_properties']);

	/**
	 * Clientdbfind
	 *
	 * find client database ID by nickname or UID
	 *
	 * Description:
	 *   Displays a list of client database IDs matching a given pattern. You can either search for a clients
	 *   last known nickname or his unique identity by using the -uid option. The pattern parameter can
	 *   include regular characters and SQL wildcard characters (e.g. %).
	 *
	 * Permissions:
	 *   - b_virtualserver_client_dbsearch
	 *
	 * Usage: 
	 *     clientdbfind pattern={clientName|clientUID} [-uid]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientdbfind pattern=%Sven%
	 *   - Response:
	 *         cldbid=56
	 *
	 * @param array $params
	 *   - pattern (clientName|clientUID)
	 *   - uid [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientdbfind($params = ['pattern' => 'clientName|clientUID', 'uid']):TS3Response;

	/**
	 * Clientdbinfo
	 *
	 * display client database properties
	 *
	 * Description:
	 *   Displays detailed database information about a client including unique ID, creation date, etc.
	 *
	 * Permissions:
	 *   - b_virtualserver_client_dbinfo
	 *
	 * Usage: 
	 *     clientdbinfo cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientdbinfo cldbid=4
	 *   - Response:
	 *         client_unique_identifier=FPMPSC6MXqXq751dX7BKV0JniSo= client_nickname=ScP client_created=1265411019 ...
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientdbinfo($params = ['cldbid' => 'clientDBID']):TS3Response;

	/**
	 * Clientdblist
	 *
	 * list known client UIDs
	 *
	 * Description:
	 *   Displays a list of client identities known by the server including their database ID, last nickname,
	 *   etc.
	 *
	 * Permissions:
	 *   - b_virtualserver_client_dblist
	 *
	 * Usage: 
	 *     clientdblist [start={offset}] [duration={limit}] [-count]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientdblist
	 *   - Response:
	 *         cldbid=7 client_unique_identifier=DZhdQU58qyooEK4Fr8Ly738hEmc= client_nickname=MuhChy client_created=1259147468 client_lastconnected=1259421233 ...
	 *
	 * @param array $params
	 *   - start (offset)
	 *   - duration (limit)
	 *   - count [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientdblist($params = ['start' => 'offset', 'duration' => 'limit', 'count']):TS3Response;

	/**
	 * Clientdelperm
	 *
	 * remove permission from client
	 *
	 * Description:
	 *   Removes a set of specified permissions from a client. Multiple permissions can be removed at once. A
	 *   permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     channeldelperm cldbid={clientDBID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientdelperm cldbid=16 permid=17276|permid=21415
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientdelperm($params = ['cldbid' => 'clientDBID', 'permid' => 'permID']);

	/**
	 * Clientedit
	 *
	 * change client properties
	 *
	 * Description:
	 *   Changes a clients settings using given properties. For detailed information, see Client Properties.
	 *
	 * Permissions:
	 *   - b_client_modify_description
	 *   - b_client_set_talk_power
	 *
	 * Usage: 
	 *     clientedit clid={clientID} [client_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientedit clid=10 client_description=Best\sguy\sever!
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *   - client_properties [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientedit($params = ['clid' => 'clientID', 'client_properties']);

	/**
	 * Clientfind
	 *
	 * find client by nickname
	 *
	 * Description:
	 *   Displays a list of clients matching a given name pattern.
	 *
	 * Permissions:
	 *   - b_virtualserver_client_search
	 *
	 * Usage: 
	 *     clientfind pattern={clientName}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientfind pattern=sven
	 *   - Response:
	 *         clid=7 client_nickname=Sven
	 *
	 * @param array $params
	 *   - pattern (clientName)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientfind($params = ['pattern' => 'clientName']):TS3Response;

	/**
	 * Clientgetdbidfromuid
	 *
	 * find client database ID by UID
	 *
	 * Description:
	 *   Displays the database ID matching the unique identifier specified by cluid.
	 *
	 * Usage: 
	 *     clientgetdbidfromuid cluid={clientUID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientgetdbidfromuid cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM=
	 *   - Response:
	 *         cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM= cldbid=32
	 *
	 * @param array $params
	 *   - cluid (clientUID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientgetdbidfromuid($params = ['cluid' => 'clientUID']):TS3Response;

	/**
	 * Clientgetids
	 *
	 * find client IDs by UID
	 *
	 * Description:
	 *   Displays all client IDs matching the unique identifier specified by cluid.
	 *
	 * Usage: 
	 *     clientgetids cluid={clientUID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientgetids cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM=
	 *   - Response:
	 *         cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM= clid=1 name=Janko
	 *
	 * @param array $params
	 *   - cluid (clientUID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientgetids($params = ['cluid' => 'clientUID']):TS3Response;

	/**
	 * Clientgetnamefromdbid
	 *
	 * find client nickname by database ID
	 *
	 * Description:
	 *   Displays the unique identifier and nickname matching the database ID specified by cldbid.
	 *
	 * Usage: 
	 *     clientgetnamefromdbid cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientgetnamefromdbid cldbid=32
	 *   - Response:
	 *         cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM= cldbid=32 name=Janko
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientgetnamefromdbid($params = ['cldbid' => 'clientDBID']):TS3Response;

	/**
	 * Clientgetnamefromuid
	 *
	 * find client nickname by UID
	 *
	 * Description:
	 *   Displays the database ID and nickname matching the unique identifier specified by cluid.
	 *
	 * Usage: 
	 *     clientgetnamefromuid cluid={clientUID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientgetnamefromuid cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM=
	 *   - Response:
	 *         cluid=dyjxkshZP6bz0n3bnwFQ1CkwZOM= cldbid=32 name=Janko
	 *
	 * @param array $params
	 *   - cluid (clientUID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientgetnamefromuid($params = ['cluid' => 'clientUID']):TS3Response;

	/**
	 * Clientgetuidfromclid
	 *
	 * find client UID by client ID
	 *
	 * Description:
	 *   Displays the unique identifier matching the clientID specified by clid.
	 *
	 * Usage: 
	 *     clientgetuidfromclid clid={clientID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientgetuidfromclid clid=8
	 *   - Response:
	 *         clid=8 cluid=yXM6PUfbCcPU+joxIFek1xOQwwQ= nickname=MuhChy1
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientgetuidfromclid($params = ['clid' => 'clientID']):TS3Response;

	/**
	 * Clientinfo
	 *
	 * display client properties
	 *
	 * Description:
	 *   Displays detailed configuration information about a client including unique ID, nickname, client
	 *   version, etc.
	 *
	 * Permissions:
	 *   - b_client_info_view
	 *
	 * Usage: 
	 *     clientinfo clid={clientID}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientinfo clid=6
	 *   - Response:
	 *         client_unique_identifier=P5H2hrN6+gpQI4n\/dXp3p17vtY0= client_nickname=Rabe85 client_version=3.0.0-alpha24\s[Build:\s8785]\s(UI:\s8785) ...
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientinfo($params = ['clid' => 'clientID']):TS3Response;

	/**
	 * Clientkick
	 *
	 * kick a client
	 *
	 * Description:
	 *   Kicks one or more clients specified with clid from their currently joined channel or from the
	 *   server, depending on reasonid. The reasonmsg parameter specifies a text message sent to the kicked
	 *   clients. This parameter is optional and may only have a maximum of 40 characters. For detailed
	 *   information, see Definitions.
	 *
	 * Permissions:
	 *   - i_client_kick_from_channel_power
	 *   - i_client_kick_from_server_power
	 *   - i_client_needed_kick_from_channel_power
	 *   - i_client_needed_kick_from_server_power
	 *
	 * Usage: 
	 *     clientkick clid={clientID}... reasonid={4|5} [reasonmsg={text}]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientkick clid=5|clid=6 reasonid=4 reasonmsg=Go\saway!
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *   - reasonid (4|5)
	 *   - reasonmsg (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientkick($params = ['clid' => 'clientID', 'reasonid' => '4|5', 'reasonmsg' => 'text']);

	/**
	 * Clientlist
	 *
	 * list clients online on a virtual server
	 *
	 * Description:
	 *   Displays a list of clients online on a virtual server including their ID, nickname, status flags,
	 *   etc. The output can be modified using several command options. Please note that the output will only
	 *   contain clients which are currently in channels you're able to subscribe to.
	 *
	 * Permissions:
	 *   - b_virtualserver_client_list
	 *   - i_channel_needed_subscribe_power
	 *   - i_channel_subscribe_power
	 *
	 * Usage: 
	 *     clientlist [-uid] [-away] [-voice] [-times] [-groups] [-info] [-country]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientlist -away
	 *   - Response:
	 *         clid=5 cid=7 client_database_id=40 client_nickname=ScP client_type=0 client_away=1 client_away_message=not\shere|clid=6 ...
	 *
	 * @param array $params
	 *   - uid [optional]
	 *   - away [optional]
	 *   - voice [optional]
	 *   - times [optional]
	 *   - groups [optional]
	 *   - info [optional]
	 *   - country [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientlist($params = ['uid', 'away', 'voice', 'times', 'groups', 'info', 'country']):TS3Response;

	/**
	 * Clientmove
	 *
	 * move a client
	 *
	 * Description:
	 *   Moves one or more clients specified with clid to the channel with ID cid. If the target channel has
	 *   a password, it needs to be specified with cpw. If the channel has no password, the parameter can be
	 *   omitted.
	 *
	 * Permissions:
	 *   - i_client_move_power
	 *   - i_client_needed_move_power
	 *
	 * Usage: 
	 *     clientmove clid={clientID}... cid={channelID} [cpw={channelPassword}]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientmove clid=5|clid=6 cid=3
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *   - cid (channelID)
	 *   - cpw (channelPassword)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientmove($params = ['clid' => 'clientID', 'cid' => 'channelID', 'cpw' => 'channelPassword']);

	/**
	 * Clientpermlist
	 *
	 * list client specific permissions
	 *
	 * Description:
	 *   Displays a list of permissions defined for a client.
	 *
	 * Permissions:
	 *   - b_virtualserver_client_permission_list
	 *
	 * Usage: 
	 *     clientpermlist cldbid={clientDBID} [-permsid]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientpermlist cldbid=2
	 *   - Response:
	 *         cldbid=2 permid=4353 permvalue=1 permnegated=0 permskip=0|permid=17276 permvalue=50 permnegated=0 permskip=0|permid=21415 ...
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *   - permsid [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientpermlist($params = ['cldbid' => 'clientDBID', 'permsid']):TS3Response;

	/**
	 * Clientpoke
	 *
	 * poke a client
	 *
	 * Description:
	 *   Sends a poke message to the client specified with clid.
	 *
	 * Permissions:
	 *   - i_client_needed_poke_power
	 *   - i_client_poke_power
	 *
	 * Usage: 
	 *     clientpoke clid={clientID} msg={text}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientpoke clid=5 msg=Wake\sup!
	 *
	 * @param array $params
	 *   - clid (clientID)
	 *   - msg (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientpoke($params = ['clid' => 'clientID', 'msg' => 'text']);

	/**
	 * Clientsetserverquerylogin
	 *
	 * set own login credentials
	 *
	 * Description:
	 *   Updates your own ServerQuery login credentials using a specified username. The password will be
	 *   auto-generated.
	 *
	 * Permissions:
	 *   - b_client_create_modify_serverquery_login
	 *
	 * Usage: 
	 *     clientsetserverquerylogin client_login_name={username}
	 *
	 * Example: 
	 *   - Request: 
	 *         clientsetserverquerylogin client_login_name=admin
	 *   - Response:
	 *         client_login_password=+r\/TQqvR
	 *
	 * @param array $params
	 *   - client_login_name (username)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientsetserverquerylogin($params = ['client_login_name' => 'username']):TS3Response;

	/**
	 * Clientupdate
	 *
	 * set own properties
	 *
	 * Description:
	 *   Change your ServerQuery clients settings using given properties. For detailed information, see
	 *   Client Properties.
	 *
	 * Usage: 
	 *     clientupdate [client_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         clientupdate client_nickname=ScP\s(query)
	 *
	 * @param array $params
	 *   - client_properties [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function clientupdate($params = ['client_properties']);

	/**
	 * Complainadd
	 *
	 * create a client complaint
	 *
	 * Description:
	 *   Submits a complaint about a connected client with database ID tcldbid to the server.
	 *
	 * Permissions:
	 *   - i_client_complain_power
	 *   - i_client_needed_complain_power
	 *
	 * Usage: 
	 *     complainadd tcldbid={targetClientDBID} message={text}
	 *
	 * Example: 
	 *   - Request: 
	 *         complainadd tcldbid=3 message=Bad\sguy!
	 *
	 * @param array $params
	 *   - tcldbid (targetClientDBID)
	 *   - message (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function complainadd($params = ['tcldbid' => 'targetClientDBID', 'message' => 'text']);

	/**
	 * Complaindel
	 *
	 * delete a client complaint
	 *
	 * Description:
	 *   Deletes the complaint about the client with ID tcldbid submitted by the client with ID fcldbid from
	 *   the server.
	 *
	 * Permissions:
	 *   - b_client_complain_delete
	 *   - b_client_complain_delete_own
	 *
	 * Usage: 
	 *     complaindel tcldbid={targetClientDBID} fcldbid={fromClientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         complaindel tcldbid=3 fcldbid=4
	 *
	 * @param array $params
	 *   - tcldbid (targetClientDBID)
	 *   - fcldbid (fromClientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function complaindel($params = ['tcldbid' => 'targetClientDBID', 'fcldbid' => 'fromClientDBID']);

	/**
	 * Complaindelall
	 *
	 * delete all client complaints
	 *
	 * Description:
	 *   Deletes all complaints about the client with database ID tcldbid from the server.
	 *
	 * Permissions:
	 *   - b_client_complain_delete
	 *
	 * Usage: 
	 *     complaindelall tcldbid={targetClientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         complaindelall tcldbid=3
	 *
	 * @param array $params
	 *   - tcldbid (targetClientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function complaindelall($params = ['tcldbid' => 'targetClientDBID']);

	/**
	 * Complainlist
	 *
	 * list client complaints on a virtual server
	 *
	 * Description:
	 *   Displays a list of complaints on the selected virtual server. If tcldbid is specified, only
	 *   complaints about the targeted client will be shown.
	 *
	 * Permissions:
	 *   - b_client_complain_list
	 *
	 * Usage: 
	 *     complainlist [tcldbid={targetClientDBID}]
	 *
	 * Example: 
	 *   - Request: 
	 *         complainlist tcldbid=3
	 *   - Response:
	 *         tcldbid=3 tname=Julian fcldbid=56 fname=Sven message=Bad\sguy! timestamp=1259440948 ...
	 *
	 * @param array $params
	 *   - tcldbid (targetClientDBID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function complainlist($params = ['tcldbid' => 'targetClientDBID']):TS3Response;

	/**
	 * Custominfo
	 *
	 * display custom client properties
	 *
	 * Description:
	 *   Displays a list of custom properties for the client specified with cldbid.
	 *
	 * Usage: 
	 *     custominfo cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         custominfo cldbid=3
	 *   - Response:
	 *         cldbid=3 ident=forum_account value=ScP|ident=forum_id value=123
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function custominfo($params = ['cldbid' => 'clientDBID']):TS3Response;

	/**
	 * Customsearch
	 *
	 * search for custom client properties
	 *
	 * Description:
	 *   Searches for custom client properties specified by ident and value. The value parameter can include
	 *   regular characters and SQL wildcard characters (e.g. %).
	 *
	 * Usage: 
	 *     customsearch ident={ident} pattern={pattern}
	 *
	 * Example: 
	 *   - Request: 
	 *         customsearch ident=forum_account pattern=%ScP%
	 *   - Response:
	 *         cldbid=2 ident=forum_account value=ScP
	 *
	 * @param array $params
	 *   - ident (ident)
	 *   - pattern (pattern)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function customsearch($params = ['ident' => 'ident', 'pattern' => 'pattern']):TS3Response;

	/**
	 * Ftcreatedir
	 *
	 * create a directory
	 *
	 * Description:
	 *   Creates new directory in a channels file repository.
	 *
	 * Permissions:
	 *   - i_ft_directory_create_power
	 *   - i_ft_needed_file_directory_create_power
	 *
	 * Usage: 
	 *     ftcreatedir cid={channelID} cpw={channelPassword} dirname={dirPath}
	 *
	 * Example: 
	 *   - Request: 
	 *         ftcreatedir cid=2 cpw= dirname=\/My\sDirectory
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cpw (channelPassword)
	 *   - dirname (dirPath)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftcreatedir($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'dirname' => 'dirPath']);

	/**
	 * Ftdeletefile
	 *
	 * delete a file
	 *
	 * Description:
	 *   Deletes one or more files stored in a channels file repository.
	 *
	 * Permissions:
	 *   - i_ft_file_delete_power
	 *   - i_ft_needed_file_delete_power
	 *
	 * Usage: 
	 *     ftdeletefile cid={channelID} cpw={channelPassword} name={filePath}...
	 *
	 * Example: 
	 *   - Request: 
	 *         ftdeletefile cid=2 cpw= name=\/Pic1.PNG|name=\/Pic2.PNG
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cpw (channelPassword)
	 *   - name (filePath)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftdeletefile($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'name' => 'filePath']);

	/**
	 * Ftgetfileinfo
	 *
	 * display details about a file
	 *
	 * Description:
	 *   Displays detailed information about one or more specified files stored in a channels file
	 *   repository.
	 *
	 * Permissions:
	 *   - i_ft_file_browse_power
	 *   - i_ft_needed_file_browse_power
	 *
	 * Usage: 
	 *     ftgetfileinfo cid={channelID} cpw={channelPassword} name={filePath}...
	 *
	 * Example: 
	 *   - Request: 
	 *         ftgetfileinfo cid=2 cpw= path=\/Pic1.PNG|cid=2 cpw= path=\/Pic2.PNG
	 *   - Response:
	 *         cid=2 path=\/ name=Stuff size=0 datetime=1259415210 type=0|name=Pic1.PNG size=563783 datetime=1259425462 type=1|name=Pic2.PNG ...
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cpw (channelPassword)
	 *   - name (filePath)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftgetfileinfo($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'name' => 'filePath']):TS3Response;

	/**
	 * Ftgetfilelist
	 *
	 * list files stored in a channel filebase
	 *
	 * Description:
	 *   Displays a list of files and directories stored in the specified channels file repository.
	 *
	 * Permissions:
	 *   - i_ft_file_browse_power
	 *   - i_ft_needed_file_browse_power
	 *
	 * Usage: 
	 *     ftgetfilelist cid={channelID} cpw={channelPassword} path={filePath}
	 *
	 * Example: 
	 *   - Request: 
	 *         ftgetfilelist cid=2 cpw= path=\/
	 *   - Response:
	 *         cid=2 path=\/ name=Stuff size=0 datetime=1259415210 type=0|name=Pic1.PNG size=563783 datetime=1259425462 type=1|name=Pic2.PNG ...
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cpw (channelPassword)
	 *   - path (filePath)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftgetfilelist($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'path' => 'filePath']):TS3Response;

	/**
	 * Ftinitdownload
	 *
	 * init a file download
	 *
	 * Description:
	 *   Initializes a file transfer download. clientftfid is an arbitrary ID to identify the file transfer
	 *   on client-side. On success, the server generates a new ftkey which is required to start downloading
	 *   the file through TeamSpeak 3's file transfer interface. Since version 3.0.13 there is an optional
	 *   proto parameter. The client can request a protocol version with it. Currently only 0 and 1 are
	 *   supported which only differ in the way they handle some timings. The server will reply which
	 *   protocol version it will support. The server will reply with an ip parameter if it determines the
	 *   filetransfer subsystem is not reachable by the ip that is currently being used for the query
	 *   connection.
	 *
	 * Permissions:
	 *   - _per_client
	 *   - _power
	 *   - download
	 *   - download
	 *   - i_ft_file_download_power
	 *   - i_ft_needed_file_
	 *   - i_ft_quota_mb_
	 *
	 * Usage: 
	 *     ftinitdownload clientftfid={clientFileTransferID} name={filePath}
	 *
	 * Example: 
	 *   - Request: 
	 *         ftinitdownload clientftfid=1 name=\/image.iso cid=5 cpw= seekpos=0
	 *   - Response:
	 *         clientftfid=1 serverftfid=7 ftkey=NrOga\/4d2GpYC5oKgxuclTO37X83ca\/1 port=30033 size=673460224 proto=0
	 *
	 * @param array $params
	 *   - clientftfid (clientFileTransferID)
	 *   - name (filePath)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftinitdownload($params = ['clientftfid' => 'clientFileTransferID', 'name' => 'filePath']):TS3Response;

	/**
	 * Ftinitupload
	 *
	 * init a file upload
	 *
	 * Description:
	 *   Initializes a file transfer upload. clientftfid is an arbitrary ID to identify the file transfer on
	 *   client-side. On success, the server generates a new ftkey which is required to start uploading the
	 *   file through TeamSpeak 3's file transfer interface. Since version 3.0.13 there is an optional proto
	 *   parameter. The client can request a protocol version with it. Currently only 0 and 1 are supported
	 *   which only differ in the way they handle some timings. The server will reply which protocol version
	 *   it will support. The server will reply with an ip parameter if it determines the filetransfer
	 *   subsystem is not reachable by the ip that is currently being used for the query connection.
	 *
	 * Permissions:
	 *   - _power
	 *   - i_ft_file_upload_power
	 *   - i_ft_needed_file_
	 *   - i_ft_quota_mb_upload_per_client
	 *   - upload
	 *
	 * Usage: 
	 *     ftinitupload clientftfid={clientFileTransferID} name={filePath}
	 *
	 * Example: 
	 *   - Request: 
	 *         ftinitupload clientftfid=1 name=\/image.iso cid=5 cpw= size=673460224 overwrite=1 resume=0
	 *   - Response:
	 *         clientftfid=1 serverftfid=6 ftkey=itRNdsIOvcBiBg\/Xj4Ge51ZSrsShHuid port=30033 seekpos=0 proto=0
	 *
	 * @param array $params
	 *   - clientftfid (clientFileTransferID)
	 *   - name (filePath)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftinitupload($params = ['clientftfid' => 'clientFileTransferID', 'name' => 'filePath']):TS3Response;

	/**
	 * Ftlist
	 *
	 * list active file transfers
	 *
	 * Description:
	 *   Displays a list of running file transfers on the selected virtual server. The output contains the
	 *   path to which a file is uploaded to, the current transfer rate in bytes per second, etc.
	 *
	 * Permissions:
	 *   - b_ft_transfer_list
	 *
	 * Usage: 
	 *     ftlist
	 *
	 * Example: 
	 *   - Request: 
	 *         ftlist
	 *   - Response:
	 *         clid=2 path=files\/virtualserver_1\/channel_5 name=image.iso size=673460224 sizedone=450756 clientftfid=2 serverftfid=6 sender=0 status=1 current_speed=60872.8 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftlist():TS3Response;

	/**
	 * Ftrenamefile
	 *
	 * rename a file
	 *
	 * Description:
	 *   Renames a file in a channels file repository. If the two parameters tcid and tcpw are specified, the
	 *   file will be moved into another channels file repository.
	 *
	 * Permissions:
	 *   - i_ft_file_rename_power
	 *   - i_ft_needed_file_rename_power
	 *
	 * Usage: 
	 *     ftrenamefile cid={channelID} cpw={channelPassword}
	 *
	 * Example: 
	 *   - Request: 
	 *         ftrenamefile cid=2 cpw= tcid=3 tcpw=secret oldname=\/Pic3.PNG newname=\/Pic3.PNG
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cpw (channelPassword)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftrenamefile($params = ['cid' => 'channelID', 'cpw' => 'channelPassword']);

	/**
	 * Ftstop
	 *
	 * stop a file transfer
	 *
	 * Description:
	 *   Stops the running file transfer with server-side ID serverftfid.
	 *
	 * Usage: 
	 *     ftstop serverftfid={serverFileTransferID} delete={1|0}
	 *
	 * Example: 
	 *   - Request: 
	 *         ftstop serverftfid=2 delete=1
	 *
	 * @param array $params
	 *   - serverftfid (serverFileTransferID)
	 *   - delete (1|0)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function ftstop($params = ['serverftfid' => 'serverFileTransferID', 'delete' => '1|0']);

	/**
	 * Gm
	 *
	 * send global text message
	 *
	 * Description:
	 *   Sends a text message to all clients on all virtual servers in the TeamSpeak 3 Server instance.
	 *
	 * Permissions:
	 *   - b_serverinstance_textmessage_send
	 *
	 * Usage: 
	 *     gm msg={text}
	 *
	 * Example: 
	 *   - Request: 
	 *         gm msg=Hello\sWorld!
	 *
	 * @param array $params
	 *   - msg (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function gm($params = ['msg' => 'text']);

	/**
	 * Hostinfo
	 *
	 * display server instance connection info
	 *
	 * Description:
	 *   Displays detailed connection information about the server instance including uptime, number of
	 *   virtual servers online, traffic information, etc. For detailed information, see Server Instance
	 *   Properties.
	 *
	 * Permissions:
	 *   - b_serverinstance_info_view
	 *
	 * Usage: 
	 *     hostinfo
	 *
	 * Example: 
	 *   - Request: 
	 *         hostinfo
	 *   - Response:
	 *         instance_uptime=1903203 host_timestamp_utc=1259337246 virtualservers_running_total=1 connection_filetransfer_bandwidth_sent=0 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function hostinfo():TS3Response;

	/**
	 * Instanceedit
	 *
	 * change server instance properties
	 *
	 * Description:
	 *   Changes the server instance configuration using given properties. For detailed information, see
	 *   Server Instance Properties.
	 *
	 * Permissions:
	 *   - b_serverinstance_modify_settings
	 *
	 * Usage: 
	 *     instanceedit [instance_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         instanceedit serverinstance_filetransfer_port=1337
	 *
	 * @param array $params
	 *   - instance_properties [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function instanceedit($params = ['instance_properties']);

	/**
	 * Instanceinfo
	 *
	 * display server instance properties
	 *
	 * Description:
	 *   Displays the server instance configuration including database revision number, the file transfer
	 *   port, default group IDs, etc. For detailed information, see Server Instance Properties.
	 *
	 * Permissions:
	 *   - b_serverinstance_info_view
	 *
	 * Usage: 
	 *     instanceinfo
	 *
	 * Example: 
	 *   - Request: 
	 *         instanceinfo
	 *   - Response:
	 *         serverinstance_database_version=11 serverinstance_filetransfer_port=30033 serverinstance_template_guest_serverquery_group=1 serverinstance_template_serveradmin_group=3 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function instanceinfo():TS3Response;

	/**
	 * Logadd
	 *
	 * add custom entry to log
	 *
	 * Description:
	 *   Writes a custom entry into the servers log. Depending on your permissions, you'll be able to add
	 *   entries into the server instance log and/or your virtual servers log. The loglevel parameter
	 *   specifies the type of the entry. For detailed information, see Definitions.
	 *
	 * Permissions:
	 *   - b_serverinstance_log_add
	 *   - b_virtualserver_log_add
	 *
	 * Usage: 
	 *     logadd loglevel={1-4} logmsg={text}
	 *
	 * Example: 
	 *   - Request: 
	 *         logadd loglevel=4 logmsg=Informational\smessage!
	 *
	 * @param array $params
	 *   - loglevel (1-4)
	 *   - logmsg (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function logadd($params = ['loglevel' => '1-4', 'logmsg' => 'text']);

	/**
	 * Login
	 *
	 * authenticate with the server
	 *
	 * Description:
	 *   Authenticates with the TeamSpeak 3 Server instance using given ServerQuery login credentials.
	 *
	 * Permissions:
	 *   - b_serverquery_login
	 *
	 * Usage: 
	 *     login client_login_name={username} client_login_password={password}
	 *
	 * Example: 
	 *   - Request: 
	 *         login client_login_name=xyz client_login_password=xyz
	 *
	 * @param array $params
	 *   - client_login_name (username)
	 *   - client_login_password (password)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function login($params = ['client_login_name' => 'username', 'client_login_password' => 'password']);

	/**
	 * Logout
	 *
	 * deselect virtual server and log out
	 *
	 * Description:
	 *   Deselects the active virtual server and logs out from the server instance.
	 *
	 * Permissions:
	 *   - b_serverquery_login
	 *
	 * Usage: 
	 *     logout
	 *
	 * Example: 
	 *   - Request: 
	 *         logout
	 *
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function logout();

	/**
	 * Logview
	 *
	 * list recent log entries
	 *
	 * Description:
	 *   Displays a specified number of entries from the servers log. If instance is set to 1, the server
	 *   will return lines from the master logfile (ts3server_0.log) instead of the selected virtual server
	 *   logfile.
	 *
	 * Permissions:
	 *   - b_serverinstance_log_view
	 *   - b_virtualserver_log_view
	 *
	 * Usage: 
	 *     logview [lines={1-100}] [reverse={1|0}] [instance={1|0}] [begin_pos={n}]
	 *
	 * Example: 
	 *   - Request: 
	 *         logview lines=30
	 *   - Response:
	 *         last_pos=403788 file_size=411980 l=\p\slistening\son\s0.0.0.0:9987 ...
	 *
	 * @param array $params
	 *   - lines (1-100)
	 *   - reverse (1|0)
	 *   - instance (1|0)
	 *   - begin_pos (n)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function logview($params = ['lines' => '1-100', 'reverse' => '1|0', 'instance' => '1|0', 'begin_pos' => 'n']):TS3Response;

	/**
	 * Messageadd
	 *
	 * send an offline message
	 *
	 * Description:
	 *   Sends an offline message to the client specified by cluid.
	 *
	 * Usage: 
	 *     messageadd cluid={clientUID} subject={subject} message={text}
	 *
	 * Example: 
	 *   - Request: 
	 *         messageadd cluid=oHhi9WzXLNEFQOwAu4JYKGU+C+c= subject=Hi! message=Where\sare\syou?!?
	 *
	 * @param array $params
	 *   - cluid (clientUID)
	 *   - subject (subject)
	 *   - message (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function messageadd($params = ['cluid' => 'clientUID', 'subject' => 'subject', 'message' => 'text']);

	/**
	 * Messagedel
	 *
	 * delete an offline message from your inbox
	 *
	 * Description:
	 *   Deletes an existing offline message with ID msgid from your inbox.
	 *
	 * Usage: 
	 *     messagedel msgid={messageID}
	 *
	 * Example: 
	 *   - Request: 
	 *         messagedel msgid=4
	 *
	 * @param array $params
	 *   - msgid (messageID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function messagedel($params = ['msgid' => 'messageID']);

	/**
	 * Messageget
	 *
	 * display an offline message from your inbox
	 *
	 * Description:
	 *   Displays an existing offline message with ID msgid from your inbox. Please note that this does not
	 *   automatically set the flag_read property of the message.
	 *
	 * Usage: 
	 *     messageget msgid={messageID}
	 *
	 * Example: 
	 *   - Request: 
	 *         messageget msgid=4
	 *   - Response:
	 *         msgid=4 cluid=xwEzb5ENOaglVHu9oelK++reUyE= subject=Hi! message=Where\sare\syou?!?
	 *
	 * @param array $params
	 *   - msgid (messageID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function messageget($params = ['msgid' => 'messageID']):TS3Response;

	/**
	 * Messagelist
	 *
	 * list offline messages from your inbox
	 *
	 * Description:
	 *   Displays a list of offline messages you've received. The output contains the senders unique
	 *   identifier, the messages subject, etc.
	 *
	 * Usage: 
	 *     messagelist
	 *
	 * Example: 
	 *   - Request: 
	 *         messagelist
	 *   - Response:
	 *         msgid=4 cluid=xwEzb5ENOaglVHu9oelK++reUyE= subject=Test timestamp=1259439465 flag_read=0 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function messagelist():TS3Response;

	/**
	 * Messageupdateflag
	 *
	 * mark an offline message as read
	 *
	 * Description:
	 *   Updates the flag_read property of the offline message specified with msgid. If flag is set to 1, the
	 *   message will be marked as read.
	 *
	 * Usage: 
	 *     messageupdateflag msgid={messageID} flag={1|0}
	 *
	 * Example: 
	 *   - Request: 
	 *         messageupdateflag msgid=4 flag=1
	 *
	 * @param array $params
	 *   - msgid (messageID)
	 *   - flag (1|0)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function messageupdateflag($params = ['msgid' => 'messageID', 'flag' => '1|0']);

	/**
	 * Permfind
	 *
	 * find permission assignments by ID
	 *
	 * Description:
	 *   Displays detailed information about all assignments of the permission specified with permid. The
	 *   output is similar to permoverview which includes the type and the ID of the client, channel or group
	 *   associated with the permission. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - b_serverinstance_permission_find
	 *   - b_virtualserver_permission_find
	 *
	 * Usage: 
	 *     permfind [permid={permID}...] [permsid={permName}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         permfind permid=4353
	 *   - Response:
	 *         t=0 id1=1 id2=0 p=4353|t=0 id1=2 id2=0 p=4353
	 *
	 * @param array $params
	 *   - permid (permID)
	 *   - permsid (permName)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function permfind($params = ['permid' => 'permID', 'permsid' => 'permName']):TS3Response;

	/**
	 * Permget
	 *
	 * display client permission value for yourself
	 *
	 * Description:
	 *   Displays the current value of the permission specified with permid or permsid for your own
	 *   connection. This can be useful when you need to check your own privileges.
	 *
	 * Permissions:
	 *   - b_client_permissionoverview_own
	 *
	 * Usage: 
	 *     permget permid={permID}|permid={permID}
	 *
	 * Example: 
	 *   - Request: 
	 *         permget permid=21174
	 *   - Response:
	 *         permsid=i_client_move_power permid=21174 permvalue=100
	 *
	 * @param array $params
	 *   - permid (permID}|permid)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function permget($params = ['permid' => 'permID}|permid']):TS3Response;

	/**
	 * Permidgetbyname
	 *
	 * find permission ID by name
	 *
	 * Description:
	 *   Displays the database ID of one or more permissions specified by permsid.
	 *
	 * Permissions:
	 *   - b_serverinstance_permission_list
	 *
	 * Usage: 
	 *     permidgetbyname permsid={permName}...
	 *
	 * Example: 
	 *   - Request: 
	 *         permidgetbyname permsid=b_serverinstance_help_view|permsid=b_serverinstance_info_view
	 *   - Response:
	 *         permsid=b_serverinstance_help_view permid=4353|permsid=b_serverinstance_info_view permid=4355
	 *
	 * @param array $params
	 *   - permsid (permName)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function permidgetbyname($params = ['permsid' => 'permName']):TS3Response;

	/**
	 * Permissionlist
	 *
	 * list permissions available
	 *
	 * Description:
	 *   Displays a list of permissions available on the server instance including ID, name and description.
	 *
	 * Permissions:
	 *   - b_serverinstance_permission_list
	 *
	 * Usage: 
	 *     permissionlist
	 *
	 * Example: 
	 *   - Request: 
	 *         permissionlist
	 *   - Response:
	 *         permid=21413 permname=b_client_channel_textmessage_send permdesc=Send\stext\smessages\sto\schannel|permid=21414 permname=i_client_talk_power ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function permissionlist():TS3Response;

	/**
	 * Permoverview
	 *
	 * display client permission overview
	 *
	 * Description:
	 *   Displays all permissions assigned to a client for the channel specified with cid. If permid is set
	 *   to 0, all permissions will be displayed. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - b_client_permissionoverview_view
	 *
	 * Usage: 
	 *     permoverview cid={channelID} cldbid={clientDBID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         permoverview cldbid=57 cid=74 permid=0
	 *   - Response:
	 *         t=0 id1=5 id2=0 p=37 v=1 n=0 s=0|t=0 id1=5 id2=0 p=38 v=1 n=0 s=0 ...
	 *
	 * @param array $params
	 *   - cid (channelID)
	 *   - cldbid (clientDBID)
	 *   - permid (permID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function permoverview($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID', 'permid' => 'permID']):TS3Response;

	/**
	 * Permreset
	 *
	 * delete all server and channel groups and restore default permissions
	 *
	 * Description:
	 *   Restores the default permission settings on the selected virtual server and creates a new initial
	 *   administrator token. Please note that in case of an error during the permreset call - e.g. when the
	 *   database has been modified or corrupted - the virtual server will be deleted from the database.
	 *
	 * Permissions:
	 *   - b_virtualserver_permission_reset
	 *
	 * Usage: 
	 *     permreset
	 *
	 * Example: 
	 *   - Request: 
	 *         permreset
	 *   - Response:
	 *         token=eKnFZQ9EK7G7MhtuQB6+N2B1PNZZ6OZL3ycDp2OW
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function permreset():TS3Response;

	/**
	 * Privilegekeyadd
	 *
	 * creates a new privilege key
	 *
	 * Description:
	 *   Create a new token. If tokentype is set to 0, the ID specified with tokenid1 will be a server group
	 *   ID. Otherwise, tokenid1 is used as a channel group ID and you need to provide a valid channel ID
	 *   using tokenid2. The tokencustomset parameter allows you to specify a set of custom client
	 *   properties. This feature can be used when generating tokens to combine a website account database
	 *   with a TeamSpeak user. The syntax of the value needs to be escaped using the ServerQuery escape
	 *   patterns and has to follow the general syntax of: ident=ident1 value=value1|ident=ident2
	 *   value=value2|ident=ident3 value=value3
	 *
	 * Permissions:
	 *   - b_virtualserver_token_add
	 *   - i_group_member_add_power
	 *   - i_group_needed_member_add_power
	 *
	 * Usage: 
	 *     privilegekeyadd tokentype={1|0} tokenid1={groupID} tokenid2={channelID}
	 *
	 * Example: 
	 *   - Request: 
	 *         privilegekeyadd tokentype=0 tokenid1=6 tokenid2=0 tokendescription=Test\stoken\swith\scustom\sset tokencustomset=ident=forum_user\svalue=Sven\sPaulsen\pident=forum_id\svalue=123
	 *   - Response:
	 *         token=eKnFZQ9EK7G7MhtuQB6+N2B1PNZZ6OZL3ycDp2OW
	 *
	 * @param array $params
	 *   - tokentype (1|0)
	 *   - tokenid1 (groupID)
	 *   - tokenid2 (channelID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function privilegekeyadd($params = ['tokentype' => '1|0', 'tokenid1' => 'groupID', 'tokenid2' => 'channelID']):TS3Response;

	/**
	 * Privilegekeydelete
	 *
	 * delete an existing privilege key
	 *
	 * Description:
	 *   Deletes an existing token matching the token key specified with token.
	 *
	 * Permissions:
	 *   - b_virtualserver_token_delete
	 *
	 * Usage: 
	 *     privilegekeydelete token={tokenKey}
	 *
	 * Example: 
	 *   - Request: 
	 *         privilegekeydelete token=eKnFZQ9EK7G7MhtuQB6+N2B1PNZZ6OZL3ycDp2OW
	 *
	 * @param array $params
	 *   - token (tokenKey)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function privilegekeydelete($params = ['token' => 'tokenKey']);

	/**
	 * Privilegekeylist
	 *
	 * list all existing privilege keys on this server
	 *
	 * Description:
	 *   Displays a list of privilege keys available including their type and group IDs. Tokens can be used
	 *   to gain access to specified server or channel groups. A privilege key is similar to a client with
	 *   administrator privileges that adds you to a certain permission group, but without the necessity of a
	 *   such a client with administrator privileges to actually exist. It is a long (random looking) string
	 *   that can be used as a ticket into a specific server group.
	 *
	 * Permissions:
	 *   - b_virtualserver_token_list
	 *
	 * Usage: 
	 *     privilegekeylist
	 *
	 * Example: 
	 *   - Request: 
	 *         privilegekeylist
	 *   - Response:
	 *         token=88CVUg\/zkujt+y+WfHdko79UcM4R6uyCL6nEfy3B token_type=0 token_id1=9 token_id2=0 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function privilegekeylist():TS3Response;

	/**
	 * Privilegekeyuse
	 *
	 * use a privilege key
	 *
	 * Description:
	 *   Use a token key gain access to a server or channel group. Please note that the server will
	 *   automatically delete the token after it has been used.
	 *
	 * Permissions:
	 *   - b_virtualserver_token_use
	 *
	 * Usage: 
	 *     privilegekeyuse token={tokenKey}
	 *
	 * Example: 
	 *   - Request: 
	 *         privilegekeyuse token=eKnFZQ9EK7G7MhtuQB6+N2B1PNZZ6OZL3ycDp2OW
	 *
	 * @param array $params
	 *   - token (tokenKey)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function privilegekeyuse($params = ['token' => 'tokenKey']);

	/**
	 * Quit
	 *
	 * close connection
	 *
	 * Description:
	 *   Closes the ServerQuery connection to the TeamSpeak 3 Server instance.
	 *
	 * Usage: 
	 *     quit
	 *
	 * Example: 
	 *   - Request: 
	 *         quit
	 *
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function quit();

	/**
	 * Sendtextmessage
	 *
	 * send text message
	 *
	 * Description:
	 *   Sends a text message to a specified target. If targetmode is set to 1, a message is sent to the
	 *   client with the ID specified by target. If targetmode is set to 2 or 3, the target parameter will be
	 *   ignored and a message is sent to the current channel or server respectively.
	 *
	 * Permissions:
	 *   - b_client_channel_textmessage_send
	 *   - b_client_server_textmessage_send
	 *   - i_client_needed_private_textmessage_power
	 *   - i_client_private_textmessage_power
	 *
	 * Usage: 
	 *     sendtextmessage targetmode={1-3} target={clientID} msg={text}
	 *
	 * Example: 
	 *   - Request: 
	 *         sendtextmessage targetmode=2 target=1 msg=Hello\sWorld!
	 *
	 * @param array $params
	 *   - targetmode (1-3)
	 *   - target (clientID)
	 *   - msg (text)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function sendtextmessage($params = ['targetmode' => '1-3', 'target' => 'clientID', 'msg' => 'text']);

	/**
	 * Servercreate
	 *
	 * create a virtual server
	 *
	 * Description:
	 *   Creates a new virtual server using the given properties and displays its ID, port and initial
	 *   administrator privilege key. If virtualserver_port is not specified, the server will test for the
	 *   first unused UDP port. The first virtual server will be running on UDP port 9987 by default.
	 *   Subsequently started virtual servers will be running on increasing UDP port numbers. For detailed
	 *   information, see Virtual Server Properties.
	 *
	 * Permissions:
	 *   - b_virtualserver_create
	 *
	 * Usage: 
	 *     servercreate virtualserver_name={serverName}
	 *
	 * Example: 
	 *   - Request: 
	 *         servercreate virtualserver_name=TeamSpeak\s]\p[\sServer virtualserver_port=9988 virtualserver_maxclients=32
	 *   - Response:
	 *         sid=2 virtualserver_port=9988 token=eKnFZQ9EK7G7MhtuQB6+N2B1PNZZ6OZL3ycDp2OW
	 *
	 * @param array $params
	 *   - virtualserver_name (serverName)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servercreate($params = ['virtualserver_name' => 'serverName']):TS3Response;

	/**
	 * Serverdelete
	 *
	 * delete a virtual server
	 *
	 * Description:
	 *   Deletes the virtual server specified with sid. Please note that only virtual servers in stopped
	 *   state can be deleted.
	 *
	 * Permissions:
	 *   - b_virtualserver_delete
	 *
	 * Usage: 
	 *     serverdelete sid={serverID}
	 *
	 * Example: 
	 *   - Request: 
	 *         serverdelete sid=1
	 *
	 * @param array $params
	 *   - sid (serverID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverdelete($params = ['sid' => 'serverID']);

	/**
	 * Serveredit
	 *
	 * change virtual server properties
	 *
	 * Description:
	 *   Changes the selected virtual servers configuration using given properties. Note that this command
	 *   accepts multiple properties which means that you're able to change all settings of the selected
	 *   virtual server at once. For detailed information, see Virtual Server Properties.
	 *
	 * Permissions:
	 *   - b_virtualserver_modify_antiflood
	 *   - b_virtualserver_modify_autostart
	 *   - b_virtualserver_modify_channel_forced_silence
	 *   - b_virtualserver_modify_codec_encryption_mode
	 *   - b_virtualserver_modify_complain
	 *   - b_virtualserver_modify_default_channeladmingroup
	 *   - b_virtualserver_modify_default_channelgroup
	 *   - b_virtualserver_modify_default_servergroup
	 *   - b_virtualserver_modify_ft_quotas
	 *   - b_virtualserver_modify_ft_settings
	 *   - b_virtualserver_modify_hostbanner
	 *   - b_virtualserver_modify_hostbutton
	 *   - b_virtualserver_modify_hostmessage
	 *   - b_virtualserver_modify_icon_id
	 *   - b_virtualserver_modify_log_settings
	 *   - b_virtualserver_modify_maxclients
	 *   - b_virtualserver_modify_min_client_version
	 *   - b_virtualserver_modify_name
	 *   - b_virtualserver_modify_needed_identity_security_level
	 *   - b_virtualserver_modify_password
	 *   - b_virtualserver_modify_port
	 *   - b_virtualserver_modify_priority_speaker_dimm_modificator
	 *   - b_virtualserver_modify_reserved_slots
	 *   - b_virtualserver_modify_weblist
	 *   - b_virtualserver_modify_welcomemessage
	 *
	 * Usage: 
	 *     serveredit [virtualserver_properties...]
	 *
	 * Example: 
	 *   - Request: 
	 *         serveredit virtualserver_name=TeamSpeak\s]\p[\sServer virtualserver_maxclients=32
	 *
	 * @param array $params
	 *   - virtualserver_properties [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serveredit($params = ['virtualserver_properties']);

	/**
	 * Servergroupadd
	 *
	 * create a server group
	 *
	 * Description:
	 *   Creates a new server group using the name specified with name and displays its ID. The optional type
	 *   parameter can be used to create ServerQuery groups and template groups. For detailed information,
	 *   see Definitions.
	 *
	 * Permissions:
	 *   - b_virtualserver_servergroup_create
	 *
	 * Usage: 
	 *     servergroupadd name={groupName} [type={groupDbType}]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupadd name=Server\sAdmin
	 *   - Response:
	 *         sgid=13
	 *
	 * @param array $params
	 *   - name (groupName)
	 *   - type (groupDbType)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupadd($params = ['name' => 'groupName', 'type' => 'groupDbType']):TS3Response;

	/**
	 * Servergroupaddclient
	 *
	 * add client to server group
	 *
	 * Description:
	 *   Adds a client to the server group specified with sgid. Please note that a client cannot be added to
	 *   default groups or template groups.
	 *
	 * Permissions:
	 *   - i_group_member_add_power
	 *   - i_group_needed_member_add_power
	 *
	 * Usage: 
	 *     servergroupaddclient sgid={groupID} cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupaddclient sgid=16 cldbid=3
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - cldbid (clientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupaddclient($params = ['sgid' => 'groupID', 'cldbid' => 'clientDBID']);

	/**
	 * Servergroupaddperm
	 *
	 * assign permissions to server group
	 *
	 * Description:
	 *   Adds a set of specified permissions to the server group specified with sgid. Multiple permissions
	 *   can be added by providing the four parameters of each permission. A permission can be specified by
	 *   permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     servergroupaddperm sgid={groupID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupaddperm sgid=13 permid=17276 permvalue=50 permnegated=0 permskip=0|permid=21415 permvalue=20 permnegated=0
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupaddperm($params = ['sgid' => 'groupID', 'permid' => 'permID']);

	/**
	 * Servergroupautoaddperm
	 *
	 * globally assign permissions to server groups
	 *
	 * Description:
	 *   Adds a set of specified permissions to *ALL* regular server groups on all virtual servers. The
	 *   target groups will be identified by the value of their i_group_auto_update_type permission specified
	 *   with sgtype. Multiple permissions can be added at once. A permission can be specified by permid or
	 *   permsid. The known values for sgtype are: 10: Channel Guest 15: Server Guest 20: Query Guest 25:
	 *   Channel Voice 30: Server Normal 35: Channel Operator 40: Channel Admin 45: Server Admin 50: Query
	 *   Admin
	 *
	 * Permissions:
	 *   - b_permission_modify_power_ignore
	 *
	 * Usage: 
	 *     servergroupautoaddperm sgtype={groupID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupautoaddperm sgtype=45 permsid=b_virtualserver_start permvalue=1 permskip=0 permnegated=0
	 *
	 * @param array $params
	 *   - sgtype (groupID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupautoaddperm($params = ['sgtype' => 'groupID', 'permid' => 'permID']);

	/**
	 * Servergroupautodelperm
	 *
	 * globally remove permissions from server group
	 *
	 * Description:
	 *   Removes a set of specified permissions from *ALL* regular server groups on all virtual servers. The
	 *   target groups will be identified by the value of their i_group_auto_update_type permission specified
	 *   with sgtype. Multiple permissions can be removed at once. A permission can be specified by permid or
	 *   permsid. The known values for sgtype are: 10: Channel Guest 15: Server Guest 20: Query Guest 25:
	 *   Channel Voice 30: Server Normal 35: Channel Operator 40: Channel Admin 45: Server Admin 50: Query
	 *   Admin
	 *
	 * Permissions:
	 *   - b_permission_modify_power_ignore
	 *
	 * Usage: 
	 *     servergroupautodelperm sgtype={groupID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupautodelperm sgtype=45 permsid=b_virtualserver_start
	 *
	 * @param array $params
	 *   - sgtype (groupID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupautodelperm($params = ['sgtype' => 'groupID', 'permid' => 'permID']);

	/**
	 * Servergroupclientlist
	 *
	 * list clients in a server group
	 *
	 * Description:
	 *   Displays the IDs of all clients currently residing in the server group specified with sgid. If
	 *   you're using the optional -names option, the output will also contain the last known nickname and
	 *   the unique identifier of the clients.
	 *
	 * Permissions:
	 *   - b_virtualserver_servergroup_client_list
	 *
	 * Usage: 
	 *     servergroupclientlist sgid={groupID} [-names]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupclientlist sgid=16
	 *   - Response:
	 *         cldbid=7|cldbid=8|cldbid=9|cldbid=11|cldbid=13|cldbid=16|cldbid=18|cldbid=29|cldbid=32|cldbid=34|cldbid=37|cldbid=40|cldbid=47|cldbid=53
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - names [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupclientlist($params = ['sgid' => 'groupID', 'names']):TS3Response;

	/**
	 * Servergroupcopy
	 *
	 * create a copy of an existing server group
	 *
	 * Description:
	 *   Creates a copy of the server group specified with ssgid. If tsgid is set to 0, the server will
	 *   create a new group. To overwrite an existing group, simply set tsgid to the ID of a designated
	 *   target group. If a target group is set, the name parameter will be ignored. The type parameter can
	 *   be used to create ServerQuery groups and template groups. For detailed information, see Definitions.
	 *
	 * Permissions:
	 *   - b_virtualserver_servergroup_create
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *
	 * Usage: 
	 *     servergroupcopy ssgid={sourceGroupID} tsgid={targetGroupID}
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupcopy ssgid=6 tsgid=0 name=My\sGroup\s(Copy) type=1
	 *   - Response:
	 *         sgid=21
	 *
	 * @param array $params
	 *   - ssgid (sourceGroupID)
	 *   - tsgid (targetGroupID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupcopy($params = ['ssgid' => 'sourceGroupID', 'tsgid' => 'targetGroupID']):TS3Response;

	/**
	 * Servergroupdel
	 *
	 * delete a server group
	 *
	 * Description:
	 *   Deletes the server group specified with sgid. If force is set to 1, the server group will be deleted
	 *   even if there are clients within.
	 *
	 * Permissions:
	 *   - b_virtualserver_servergroup_delete
	 *
	 * Usage: 
	 *     servergroupdel sgid={groupID} force={1|0}
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupdel sgid=13
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - force (1|0)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupdel($params = ['sgid' => 'groupID', 'force' => '1|0']);

	/**
	 * Servergroupdelclient
	 *
	 * remove client from server group
	 *
	 * Description:
	 *   Removes a client specified with cldbid from the server group specified with sgid.
	 *
	 * Permissions:
	 *   - i_group_member_remove_power
	 *   - i_group_needed_member_remove_power
	 *
	 * Usage: 
	 *     servergroupdelclient sgid={groupID} cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupdelclient sgid=16 cldbid=3
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - cldbid (clientDBID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupdelclient($params = ['sgid' => 'groupID', 'cldbid' => 'clientDBID']);

	/**
	 * Servergroupdelperm
	 *
	 * remove permissions from server group
	 *
	 * Description:
	 *   Removes a set of specified permissions from the server group specified with sgid. Multiple
	 *   permissions can be removed at once. A permission can be specified by permid or permsid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *   - i_permission_modify_power
	 *
	 * Usage: 
	 *     servergroupdelperm sgid={groupID} [permid={permID}...]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupdelperm sgid=16 permid=17276|permid=21415
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - permid (permID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupdelperm($params = ['sgid' => 'groupID', 'permid' => 'permID']);

	/**
	 * Servergrouplist
	 *
	 * list server groups
	 *
	 * Description:
	 *   Displays a list of server groups available. Depending on your permissions, the output may also
	 *   contain global ServerQuery groups and template groups.
	 *
	 * Permissions:
	 *   - b_serverinstance_modify_querygroup
	 *   - b_serverinstance_modify_templates
	 *   - b_virtualserver_servergroup_list
	 *
	 * Usage: 
	 *     servergrouplist
	 *
	 * Example: 
	 *   - Request: 
	 *         servergrouplist
	 *   - Response:
	 *         sgid=9 name=Server\sAdmin type=1 iconid=300 savedb=1|sgid=10 name=Normal type=1 iconid=0 savedb=1|sgid=11 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergrouplist():TS3Response;

	/**
	 * Servergrouppermlist
	 *
	 * list server group permissions
	 *
	 * Description:
	 *   Displays a list of permissions assigned to the server group specified with sgid. If the -permsid
	 *   option is specified, the output will contain the permission names instead of the internal IDs.
	 *
	 * Permissions:
	 *   - b_virtualserver_servergroup_permission_list
	 *
	 * Usage: 
	 *     servergrouppermlist sgid={groupID} [-permsid]
	 *
	 * Example: 
	 *   - Request: 
	 *         servergrouppermlist sgid=13
	 *   - Response:
	 *         permid=8470 permvalue=1 permnegated=0 permskip=0|permid=8475 permvalue=1 ...
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - permsid [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergrouppermlist($params = ['sgid' => 'groupID', 'permsid']):TS3Response;

	/**
	 * Servergrouprename
	 *
	 * rename a server group
	 *
	 * Description:
	 *   Changes the name of the server group specified with sgid.
	 *
	 * Permissions:
	 *   - i_group_modify_power
	 *   - i_group_needed_modify_power
	 *
	 * Usage: 
	 *     servergrouprename sgid={groupID} name={groupName}
	 *
	 * Example: 
	 *   - Request: 
	 *         servergrouprename sgid=13 name=New\sName
	 *
	 * @param array $params
	 *   - sgid (groupID)
	 *   - name (groupName)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergrouprename($params = ['sgid' => 'groupID', 'name' => 'groupName']);

	/**
	 * Servergroupsbyclientid
	 *
	 * get all server groups of specified client
	 *
	 * Description:
	 *   Displays all server groups the client specified with cldbid is currently residing in.
	 *
	 * Usage: 
	 *     servergroupsbyclientid cldbid={clientDBID}
	 *
	 * Example: 
	 *   - Request: 
	 *         servergroupsbyclientid cldbid=18
	 *   - Response:
	 *         name=Server\sAdmin sgid=6 cldbid=18
	 *
	 * @param array $params
	 *   - cldbid (clientDBID)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servergroupsbyclientid($params = ['cldbid' => 'clientDBID']):TS3Response;

	/**
	 * Serveridgetbyport
	 *
	 * find database ID by virtual server port
	 *
	 * Description:
	 *   Displays the database ID of the virtual server running on the UDP port specified by
	 *   virtualserver_port.
	 *
	 * Permissions:
	 *   - b_serverinstance_virtualserver_list
	 *
	 * Usage: 
	 *     serveridgetbyport virtualserver_port={serverPort}
	 *
	 * Example: 
	 *   - Request: 
	 *         serveridgetbyport virtualserver_port=9987
	 *   - Response:
	 *         server_id=1
	 *
	 * @param array $params
	 *   - virtualserver_port (serverPort)
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serveridgetbyport($params = ['virtualserver_port' => 'serverPort']):TS3Response;

	/**
	 * Serverinfo
	 *
	 * display virtual server properties
	 *
	 * Description:
	 *   Displays detailed configuration information about the selected virtual server including unique ID,
	 *   number of clients online, configuration, etc. For detailed information, see Virtual Server
	 *   Properties.
	 *
	 * Permissions:
	 *   - b_virtualserver_info_view
	 *
	 * Usage: 
	 *     serverinfo
	 *
	 * Example: 
	 *   - Request: 
	 *         serverinfo
	 *   - Response:
	 *         virtualserver_port=9987 virtualserver_unique_identifier=zrPkjznB1tMnRwj01xx7RxXjqeY= virtualserver_name=TeamSpeak\s]I[\sServer ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverinfo():TS3Response;

	/**
	 * Serverlist
	 *
	 * list virtual servers
	 *
	 * Description:
	 *   Displays a list of virtual servers including their ID, status, number of clients online, etc. If
	 *   you're using the -all option, the server will list all virtual servers stored in the database. This
	 *   can be useful when multiple server instances with different machine IDs are using the same database.
	 *   The machine ID is used to identify the server instance a virtual server is associated with. The
	 *   status of a virtual server can be either online, offline, booting up, shutting down or virtual
	 *   online. While most of them are self-explanatory, virtual online is a bit more complicated. Whenever
	 *   you select a virtual server which is currently stopped with the -virtual parameter, it will be
	 *   started in virtual mode which means you are able to change its configuration, create channels or
	 *   change permissions, but no regular TeamSpeak 3 Client can connect. As soon as the last ServerQuery
	 *   client deselects the virtual server, its status will be changed back to offline.
	 *
	 * Permissions:
	 *   - b_serverinstance_virtualserver_list
	 *
	 * Usage: 
	 *     serverlist [-uid] [-short] [-all] [-onlyoffline]
	 *
	 * Example: 
	 *   - Request: 
	 *         serverlist
	 *   - Response:
	 *         virtualserver_id=1 virtualserver_port=9987 virtualserver_status=online virtualserver_clientsonline=6 ...
	 *
	 * @param array $params
	 *   - uid [optional]
	 *   - short [optional]
	 *   - all [optional]
	 *   - onlyoffline [optional]
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverlist($params = ['uid', 'short', 'all', 'onlyoffline']):TS3Response;

	/**
	 * Servernotifyregister
	 *
	 * register for event notifications
	 *
	 * Description:
	 *   Registers for a specified category of events on a virtual server to receive notification messages.
	 *   Depending on the notifications you've registered for, the server will send you a message on every
	 *   event in the view of your ServerQuery client (e.g. clients joining your channel, incoming text
	 *   messages, server configuration changes, etc). The event source is declared by the event parameter
	 *   while id can be used to limit the notifications to a specific channel.
	 *
	 * Permissions:
	 *   - b_virtualserver_notify_register
	 *
	 * Usage: 
	 *     servernotifyregister
	 *
	 * Example: 
	 *   - Request: 
	 *         servernotifyregister event=server
	 *
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servernotifyregister();

	/**
	 * Servernotifyunregister
	 *
	 * unregister from event notifications
	 *
	 * Description:
	 *   Unregisters all events previously registered with servernotifyregister so you will no longer receive
	 *   notification messages.
	 *
	 * Permissions:
	 *   - b_virtualserver_notify_unregister
	 *
	 * Usage: 
	 *     servernotifyunregister
	 *
	 * Example: 
	 *   - Request: 
	 *         servernotifyunregister
	 *
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servernotifyunregister();

	/**
	 * Serverprocessstop
	 *
	 * shutdown server process
	 *
	 * Description:
	 *   Stops the entire TeamSpeak 3 Server instance by shutting down the process.
	 *
	 * Permissions:
	 *   - b_serverinstance_stop
	 *
	 * Usage: 
	 *     serverprocessstop
	 *
	 * Example: 
	 *   - Request: 
	 *         serverprocessstop
	 *
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverprocessstop();

	/**
	 * Serverrequestconnectioninfo
	 *
	 * display virtual server connection info
	 *
	 * Description:
	 *   Displays detailed connection information about the selected virtual server including uptime, traffic
	 *   information, etc.
	 *
	 * Permissions:
	 *   - b_virtualserver_connectioninfo_view
	 *
	 * Usage: 
	 *     serverrequestconnectioninfo
	 *
	 * Example: 
	 *   - Request: 
	 *         serverrequestconnectioninfo
	 *   - Response:
	 *         connection_filetransfer_bandwidth_sent=0 connection_filetransfer_bandwidth_received=0 connection_packets_sent_total=241454 ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverrequestconnectioninfo():TS3Response;

	/**
	 * Serversnapshotcreate
	 *
	 * create snapshot of a virtual server
	 *
	 * Description:
	 *   Displays a snapshot of the selected virtual server containing all settings, groups and known client
	 *   identities. The data from a server snapshot can be used to restore a virtual servers configuration,
	 *   channels and permissions using the serversnapshotdeploy command.
	 *
	 * Permissions:
	 *   - b_virtualserver_snapshot_create
	 *
	 * Usage: 
	 *     serversnapshotcreate
	 *
	 * Example: 
	 *   - Request: 
	 *         serversnapshotcreate
	 *   - Response:
	 *         hash=bnTd2E1kNITHjJYRCFjgbKKO5P8=|virtualserver_unique_identifier=zrPkjznB1tMnRwj01xx7RxXjqeY= virtualserver_name=TeamSpeak\s]I[\sServer ...
	 *
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serversnapshotcreate():TS3Response;

	/**
	 * Serversnapshotdeploy
	 *
	 * deploy snapshot of a virtual server
	 *
	 * Description:
	 *   Restores the selected virtual servers configuration using the data from a previously created server
	 *   snapshot. Please note that the TeamSpeak 3 Server does NOT check for necessary permissions while
	 *   deploying a snapshot so the command could be abused to gain additional privileges.
	 *
	 * Permissions:
	 *   - b_virtualserver_snapshot_deploy
	 *
	 * Usage: 
	 *     serversnapshotdeploy [-mapping] virtualserver_snapshot
	 *
	 * Example: 
	 *   - Request: 
	 *         serversnapshotdeploy hash=bnTd2E1kNITHjJYRCFjgbKKO5P8=|virtualserver_unique_identifier=zrPkjznB1tMnRwj01xx7RxXjq= ...
	 *
	 * @param array $params
	 *   - mapping [optional]
	 *   - virtualserver_snapshot [optional]
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serversnapshotdeploy($params = ['mapping', 'virtualserver_snapshot']);

	/**
	 * Serverstart
	 *
	 * start a virtual server
	 *
	 * Description:
	 *   Starts the virtual server specified with sid. Depending on your permissions, you're able to start
	 *   either your own virtual server only or all virtual servers in the server instance.
	 *
	 * Permissions:
	 *   - b_virtualserver_start
	 *   - b_virtualserver_start_any
	 *
	 * Usage: 
	 *     serverstart sid={serverID}
	 *
	 * Example: 
	 *   - Request: 
	 *         serverstart sid=1
	 *
	 * @param array $params
	 *   - sid (serverID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverstart($params = ['sid' => 'serverID']);

	/**
	 * Serverstop
	 *
	 * stop a virtual server
	 *
	 * Description:
	 *   Stops the virtual server specified with sid. Depending on your permissions, you're able to stop
	 *   either your own virtual server only or all virtual servers in the server instance.
	 *
	 * Permissions:
	 *   - b_virtualserver_stop
	 *   - b_virtualserver_stop_any
	 *
	 * Usage: 
	 *     serverstop sid={serverID}
	 *
	 * Example: 
	 *   - Request: 
	 *         serverstop sid=1
	 *
	 * @param array $params
	 *   - sid (serverID)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function serverstop($params = ['sid' => 'serverID']);

	/**
	 * Servertemppasswordadd
	 *
	 * create a new temporary server password
	 *
	 * Description:
	 *   Sets a new temporary server password specified with pw. The temporary password will be valid for the
	 *   number of seconds specified with duration. The client connecting with this password will
	 *   automatically join the channel specified with tcid. If tcid is set to 0, the client will join the
	 *   default channel.
	 *
	 * Permissions:
	 *   - b_virtualserver_modify_password
	 *
	 * Usage: 
	 *     servertemppasswordadd pw={password} desc={description}
	 *
	 * Example: 
	 *   - Request: 
	 *         servertemppasswordadd pw=secret desc=none duration=3600 tcid=117535 tcpw=secret
	 *
	 * @param array $params
	 *   - pw (password)
	 *   - desc (description)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servertemppasswordadd($params = ['pw' => 'password', 'desc' => 'description']);

	/**
	 * Servertemppassworddel
	 *
	 * delete an existing temporary server password
	 *
	 * Description:
	 *   Deletes the temporary server password specified with pw.
	 *
	 * Permissions:
	 *   - b_virtualserver_modify_password
	 *
	 * Usage: 
	 *     servertemppassworddel pw={password}
	 *
	 * Example: 
	 *   - Request: 
	 *         servertemppassworddel pw=secret
	 *
	 * @param array $params
	 *   - pw (password)
	 *
	 * @return void
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	 public function servertemppassworddel($params = ['pw' => 'password']);

}
