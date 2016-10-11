<?php
/**
 * Class TS3QueryAPI
 *
 * @filesource   TS3QueryAPI.php
 * @created      11.10.2016
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

/**
 * @method TS3Response banadd($params = ['ip' => 'regexp', 'name' => 'regexp', 'uid' => 'clientUID'])
 * @method TS3Response banclient($params = ['clid' => 'clientID', 'time' => 'timeInSeconds', 'banreason' => 'text'])
 * @method void        bandel($params = ['banid' => 'banID'])
 * @method void        bandelall()
 * @method TS3Response banlist()
 * @method TS3Response bindinglist($params = ['subsystem' => 'voice|query|filetransfer'])
 * @method void        channeladdperm($params = ['cid' => 'channelID', 'permid' => 'permID'])
 * @method void        channelclientaddperm($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID'])
 * @method void        channelclientdelperm($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID'])
 * @method TS3Response channelclientpermlist($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID', 'permsid'])
 * @method TS3Response channelcreate($params = ['channel_name' => 'channelName', 'channel_properties'])
 * @method void        channeldelete($params = ['cid' => 'channelID', 'force' => '1|0'])
 * @method void        channeldelperm($params = ['cid' => '123', 'permid' => 'permID', 'permsid' => 'permName'])
 * @method void        channeledit($params = ['cid' => 'channelID', 'channel_properties'])
 * @method TS3Response channelfind($params = ['pattern' => 'channelName'])
 * @method TS3Response channelgroupadd($params = ['name' => 'groupName', 'type' => 'groupDbType'])
 * @method void        channelgroupaddperm($params = ['cgid' => 'groupID', 'permid' => 'permID'])
 * @method TS3Response channelgroupclientlist($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID'])
 * @method TS3Response channelgroupcopy($params = ['scgid' => 'sourceGroupID', 'tsgid' => 'targetGroupID'])
 * @method void        channelgroupdel($params = ['cgid' => 'groupID', 'force' => '1|0'])
 * @method void        channelgroupdelperm($params = ['cgid' => 'groupID', 'permid' => 'permID'])
 * @method TS3Response channelgrouplist()
 * @method TS3Response channelgrouppermlist($params = ['cgid' => 'groupID', 'permsid'])
 * @method void        channelgrouprename($params = ['cgid' => 'groupID', 'name' => 'groupName'])
 * @method TS3Response channelinfo($params = ['cid' => 'channelID'])
 * @method TS3Response channellist($params = ['topic', 'flags', 'voice', 'limits', 'icon', 'secondsempty'])
 * @method void        channelmove($params = ['cid' => 'channelID', 'cpid' => 'channelParentID'])
 * @method TS3Response channelpermlist($params = ['cid' => 'channelID', 'permsid'])
 * @method void        clientaddperm($params = ['cldbid' => 'clientDBID', 'permid' => 'permID'])
 * @method void        clientdbdelete($params = ['cldbid' => 'clientDBID'])
 * @method void        clientdbedit($params = ['cldbid' => 'clientDBID', 'client_properties'])
 * @method TS3Response clientdbfind($params = ['pattern' => 'clientName|clientUID', 'uid'])
 * @method TS3Response clientdbinfo($params = ['cldbid' => 'clientDBID'])
 * @method TS3Response clientdblist($params = ['start' => 'offset', 'duration' => 'limit', 'count'])
 * @method void        clientdelperm($params = ['cldbid' => 'clientDBID', 'permid' => 'permID'])
 * @method void        clientedit($params = ['clid' => 'clientID', 'client_properties'])
 * @method TS3Response clientfind($params = ['pattern' => 'clientName'])
 * @method TS3Response clientgetdbidfromuid($params = ['cluid' => 'clientUID'])
 * @method TS3Response clientgetids($params = ['cluid' => 'clientUID'])
 * @method TS3Response clientgetnamefromdbid($params = ['cldbid' => 'clientDBID'])
 * @method TS3Response clientgetnamefromuid($params = ['cluid' => 'clientUID'])
 * @method TS3Response clientgetuidfromclid($params = ['clid' => 'clientID'])
 * @method TS3Response clientinfo($params = ['clid' => 'clientID'])
 * @method void        clientkick($params = ['clid' => 'clientID', 'reasonid' => '4|5', 'reasonmsg' => 'text'])
 * @method TS3Response clientlist($params = ['uid', 'away', 'voice', 'times', 'groups', 'info', 'country'])
 * @method void        clientmove($params = ['clid' => 'clientID', 'cid' => 'channelID', 'cpw' => 'channelPassword'])
 * @method TS3Response clientpermlist($params = ['cldbid' => 'clientDBID', 'permsid'])
 * @method void        clientpoke($params = ['clid' => 'clientID', 'msg' => 'text'])
 * @method TS3Response clientsetserverquerylogin($params = ['client_login_name' => 'username'])
 * @method void        clientupdate($params = ['client_properties'])
 * @method void        complainadd($params = ['tcldbid' => 'targetClientDBID', 'message' => 'text'])
 * @method void        complaindel($params = ['tcldbid' => 'targetClientDBID', 'fcldbid' => 'fromClientDBID'])
 * @method void        complaindelall($params = ['tcldbid' => 'targetClientDBID'])
 * @method TS3Response complainlist($params = ['tcldbid' => 'targetClientDBID'])
 * @method TS3Response custominfo($params = ['cldbid' => 'clientDBID'])
 * @method TS3Response customsearch($params = ['ident' => 'ident', 'pattern' => 'pattern'])
 * @method void        ftcreatedir($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'dirname' => 'dirPath'])
 * @method void        ftdeletefile($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'name' => 'filePath'])
 * @method TS3Response ftgetfileinfo($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'name' => 'filePath'])
 * @method TS3Response ftgetfilelist($params = ['cid' => 'channelID', 'cpw' => 'channelPassword', 'path' => 'filePath'])
 * @method TS3Response ftinitdownload($params = ['clientftfid' => 'clientFileTransferID', 'name' => 'filePath'])
 * @method TS3Response ftinitupload($params = ['clientftfid' => 'clientFileTransferID', 'name' => 'filePath'])
 * @method TS3Response ftlist()
 * @method void        ftrenamefile($params = ['cid' => 'channelID', 'cpw' => 'channelPassword'])
 * @method void        ftstop($params = ['serverftfid' => 'serverFileTransferID', 'delete' => '1|0'])
 * @method void        gm($params = ['msg' => 'text'])
 * @method TS3Response hostinfo()
 * @method void        instanceedit($params = ['instance_properties'])
 * @method TS3Response instanceinfo()
 * @method void        logadd($params = ['loglevel' => '1-4', 'logmsg' => 'text'])
 * @method void        login($params = ['client_login_name' => 'username', 'client_login_password' => 'password'])
 * @method void        logout()
 * @method TS3Response logview($params = ['lines' => '1-100', 'reverse' => '1|0', 'instance' => '1|0', 'begin_pos' => 'n'])
 * @method void        messageadd($params = ['cluid' => 'clientUID', 'subject' => 'subject', 'message' => 'text'])
 * @method void        messagedel($params = ['msgid' => 'messageID'])
 * @method TS3Response messageget($params = ['msgid' => 'messageID'])
 * @method TS3Response messagelist()
 * @method void        messageupdateflag($params = ['msgid' => 'messageID', 'flag' => '1|0'])
 * @method TS3Response permfind($params = ['permid' => 'permID', 'permsid' => 'permName'])
 * @method TS3Response permget($params = ['permid' => 'permID}|permid'])
 * @method TS3Response permidgetbyname($params = ['permsid' => 'permName'])
 * @method TS3Response permissionlist()
 * @method TS3Response permoverview($params = ['cid' => 'channelID', 'cldbid' => 'clientDBID', 'permid' => 'permID'])
 * @method TS3Response permreset()
 * @method TS3Response privilegekeyadd($params = ['tokentype' => '1|0', 'tokenid1' => 'groupID', 'tokenid2' => 'channelID'])
 * @method void        privilegekeydelete($params = ['token' => 'tokenKey'])
 * @method TS3Response privilegekeylist()
 * @method void        privilegekeyuse($params = ['token' => 'tokenKey'])
 * @method void        quit()
 * @method void        sendtextmessage($params = ['targetmode' => '1-3', 'target' => 'clientID', 'msg' => 'text'])
 * @method TS3Response servercreate($params = ['virtualserver_name' => 'serverName'])
 * @method void        serverdelete($params = ['sid' => 'serverID'])
 * @method void        serveredit($params = ['virtualserver_properties'])
 * @method TS3Response servergroupadd($params = ['name' => 'groupName', 'type' => 'groupDbType'])
 * @method void        servergroupaddclient($params = ['sgid' => 'groupID', 'cldbid' => 'clientDBID'])
 * @method void        servergroupaddperm($params = ['sgid' => 'groupID', 'permid' => 'permID'])
 * @method void        servergroupautoaddperm($params = ['sgtype' => 'groupID', 'permid' => 'permID'])
 * @method void        servergroupautodelperm($params = ['sgtype' => 'groupID', 'permid' => 'permID'])
 * @method TS3Response servergroupclientlist($params = ['sgid' => 'groupID', 'names'])
 * @method TS3Response servergroupcopy($params = ['ssgid' => 'sourceGroupID', 'tsgid' => 'targetGroupID'])
 * @method void        servergroupdel($params = ['sgid' => 'groupID', 'force' => '1|0'])
 * @method void        servergroupdelclient($params = ['sgid' => 'groupID', 'cldbid' => 'clientDBID'])
 * @method void        servergroupdelperm($params = ['sgid' => 'groupID', 'permid' => 'permID'])
 * @method TS3Response servergrouplist()
 * @method TS3Response servergrouppermlist($params = ['sgid' => 'groupID', 'permsid'])
 * @method void        servergrouprename($params = ['sgid' => 'groupID', 'name' => 'groupName'])
 * @method TS3Response servergroupsbyclientid($params = ['cldbid' => 'clientDBID'])
 * @method TS3Response serveridgetbyport($params = ['virtualserver_port' => 'serverPort'])
 * @method TS3Response serverinfo()
 * @method TS3Response serverlist($params = ['uid', 'short', 'all', 'onlyoffline'])
 * @method void        servernotifyregister()
 * @method void        servernotifyunregister()
 * @method void        serverprocessstop()
 * @method TS3Response serverrequestconnectioninfo()
 * @method TS3Response serversnapshotcreate()
 * @method void        serversnapshotdeploy($params = ['mapping', 'virtualserver_snapshot'])
 * @method void        serverstart($params = ['sid' => 'serverID'])
 * @method void        serverstop($params = ['sid' => 'serverID'])
 * @method void        servertemppasswordadd($params = ['pw' => 'password', 'desc' => 'description'])
 * @method void        servertemppassworddel($params = ['pw' => 'password'])
 */
class TS3QueryAPI extends TS3Client{

	protected $methods;

	/**
	 * TS3QueryAPI constructor.
	 *
	 * @param \chillerlan\Teamspeak\TS3Config $config
	 */
	public function __construct(TS3Config $config){
		parent::__construct($config);
		$this->connect();
		$this->map_api();
	}


	protected function map_api(){
		$version = explode(' ', $this->send('serverinfo')->parse_kv()->virtualserver_version)[0];
		$file    = $this->config->storagedir.$this->config->filename.'-'.$version.'.json';

		if(is_file($file)){
			$this->methods = json_decode(file_get_contents($file));

			return $this;
		}

		throw new TS3ClientException('please create a helpfile first');
	}


	/**
	 * @param $method
	 * @param $arguments
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	public function __call($method, $arguments){

		if(isset($this->methods->{$method})){
			$m = $this->methods->{$method};

			$args = [];
			if(!empty($m->params) && is_array($arguments[0]) && !empty($arguments[0])){

				foreach($arguments[0] as $k => $param){

					if(is_int($k)){

						if(isset($m->params->{$param}) && !is_null($m->params->{$param}->value)){
							throw new TS3ClientException('parameter value '.$param.'='.$m->params->{$param}->value.' not set');
						}

						$args[] = '-'.$param;
					}
					else{
						$args[] = '-'.$k.'='.$param;
					}

				}

			}

			return $this->send($method.(!empty($args) ? ' '.implode(' ', $args) : ''));
		}

		throw new TS3ClientException('command not found');

	}

}
