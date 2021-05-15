<?php
/**
 * Class TS3Client
 *
 * @created      02.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

use chillerlan\Settings\SettingsContainerInterface;
use Psr\Log\{LoggerAwareInterface, LoggerAwareTrait, LoggerInterface, NullLogger};
use ErrorException, Throwable;

use function fclose, fsockopen, fwrite, is_resource, restore_error_handler,
	set_error_handler, stream_get_contents, stream_set_timeout, trim;

class TS3Client implements LoggerAwareInterface{
	use LoggerAwareTrait;

	/**
	 * @var \chillerlan\Teamspeak\TS3Config
	 */
	protected SettingsContainerInterface $config;

	/**
	 * @var resource|null
	 */
	protected $socket;

	/**
	 * TS3Client constructor.
	 *
	 * @param \chillerlan\Settings\SettingsContainerInterface $config
	 * @param \Psr\Log\LoggerInterface|null                   $logger
	 */
	public function __construct(SettingsContainerInterface $config, LoggerInterface $logger = null){
		$this->config = $config;
		$this->logger = $logger ?? new NullLogger;
	}

	/**
	 *
	 */
	public function __destruct(){
		$this->disconnect();
	}

	/**
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	public function connect():TS3Client{

		if(is_resource($this->socket)){
			return $this;
		}

		/** @phan-suppress-next-line PhanTypeMismatchArgumentInternal stupid inconsistent callables... */
		set_error_handler(function($severity, $msg, $file, $line){
			throw new ErrorException($msg, 0, $severity, $file, $line);
		});

		try{
			$this->socket = fsockopen($this->config->host, $this->config->port);
		}
		catch(Throwable $e){
			throw new TS3ClientException('could not connect: #'.$e->getMessage());
		}

		restore_error_handler();
		stream_set_timeout($this->socket, 1);

		$this->send('login client_login_name='.$this->config->query_user.' client_login_password='.$this->config->query_password);
		$this->send('use sid='.$this->config->vserver);

		return $this;
	}

	/**
	 * @return \chillerlan\Teamspeak\TS3Client
	 */
	public function disconnect():TS3Client{

		if(is_resource($this->socket)){
			$this->send('logout');
			$this->send('quit');

			fclose($this->socket);

			// just in case the destructor runs into this when the socket is already closed.
			$this->socket = null;
		}

		return $this;
	}

	/**
	 * @param string $command
	 *
	 * @return \chillerlan\Teamspeak\TS3Response
	 * @throws \chillerlan\Teamspeak\TS3ClientException
	 */
	public function send(string $command):TS3Response{

		if(!$this->socket){
			throw new TS3ClientException('not connected');
		}

		$command = trim($command);
		$this->logger->debug('command: '.$command);

		if(empty($command)){
			throw new TS3ClientException('empty command');
		}

		if(fwrite($this->socket, $command."\n") !== false){
			$response = stream_get_contents($this->socket);

			$this->logger->debug('response: '.$response);

			return new TS3Response($command, $response);
		}

		throw new TS3ClientException('could not send command: '.$command);
	}

}
