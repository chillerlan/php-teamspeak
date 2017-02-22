<?php
/**
 * Class TS3Client
 *
 * @filesource   TS3Client.php
 * @created      02.10.2016
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

/**
 *
 */
class TS3Client{

	/**
	 * @var \chillerlan\Teamspeak\TS3Config
	 */
	protected $config;

	/**
	 * @var resource
	 */
	protected $socket;

	/**
	 * TS3Client constructor.
	 *
	 * @param \chillerlan\Teamspeak\TS3Config $config
	 */
	public function __construct(TS3Config $config){
		$this->config = $config;

		if(!is_int($this->config->vserver)){
			$this->config->vserver = 1;
		}
	}

	/**
	 *
	 */
	public function __destruct(){
		return $this->disconnect();
	}

	/**
	 * @return array
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	public function connect():array {
		$this->socket = @fsockopen($this->config->host, $this->config->port, $errno, $errstr,3);

		if(!$this->socket){
			throw new TS3ClientException('could not connect: #'.$errno.' '.$errstr);
		}

		stream_set_timeout($this->socket, 1);

		return [
			$this->send('login '.$this->config->query_user.' '.$this->config->query_password),
			$this->send('use sid='.$this->config->vserver)
		];
	}

	/**
	 * @return array
	 */
	public function disconnect():array {

		if($this->socket){
			$r = [
				$this->send('logout'),
				$this->send('quit'),
			];

			fclose($this->socket);

			// just in case the destructor runs into this when the socket is already closed.
			$this->socket = null;

			return $r;
		}

		return [];
	}

	/**
	 * @param string $command
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	public function send(string $command):TS3Response {

		if(!$this->socket){
			throw new TS3ClientException('not connected');
		}

		$command = trim($command);

		if(empty($command)){
			throw new TS3ClientException('empty command');
		}

		if(fwrite($this->socket, $command.PHP_EOL) !== false){
			return new TS3Response($command, stream_get_contents($this->socket));
		}

		throw new TS3ClientException('could not send command: '.$command); // @codeCoverageIgnore
	}

}
