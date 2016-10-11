<?php

/**
 *
 * @filesource   TS3ClientTest.php
 * @created      09.10.2016
 * @package      chillerlan\TeamspeakTest
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\TeamspeakTest;

use chillerlan\Teamspeak\TS3Client;
use chillerlan\Teamspeak\TS3Config;
use chillerlan\Teamspeak\TS3Response;
use Dotenv\Dotenv;

class TS3ClientTest extends \PHPUnit_Framework_TestCase{

	/**
	 * @var \chillerlan\Teamspeak\TS3Client
	 */
	protected $ts3client;

	/**
	 * @var \chillerlan\Teamspeak\TS3Config
	 */
	protected $ts3config;

	protected function setUp(){
		(new Dotenv(__DIR__.'/../config', '.env'))->load();
		$this->ts3config = new TS3Config;

		$this->ts3config->host           = getenv('TS3_HOST');
		$this->ts3config->port           = getenv('TS3_PORT');
		$this->ts3config->vserver        = getenv('TS3_VSERVER');
		$this->ts3config->query_user     = getenv('TS3_QUERY_USER');
		$this->ts3config->query_password = getenv('TS3_QUERY_PASS');

		$this->ts3client = new TS3Client($this->ts3config);
	}

	public function testInstance(){
		$this->assertInstanceOf(TS3Config::class, $this->ts3config);
		$this->assertInstanceOf(TS3Client::class, $this->ts3client);
	}

	public function testConnect(){
		$response = $this->ts3client->connect();

		if(is_array($response)){
			$this->assertSame(2, count($response));

			/** @var $r \chillerlan\Teamspeak\TS3Response */
			foreach($response as $r){
				$this->assertInstanceOf(TS3Response::class, $r);

				switch($r->commandlist[0]){
					case 'login':
						$this->assertSame($this->ts3config->query_user, $r->commandlist[1]);
						$this->assertSame($this->ts3config->query_password, $r->commandlist[2]);
						break;
					case 'use':
						$this->assertSame('sid='.$this->ts3config->vserver, $r->commandlist[1]);
						break;
				}

				$this->assertSame(0, $r->error->id);
				$this->assertSame('ok', $r->error->msg);
			}

		}

	}

	/**
	 * @expectedException \chillerlan\Teamspeak\TS3ClientException
	 * @expectedExceptionMessage could not connect: #
	 */
	public function testConnectException(){
		$config = new TS3Config;

		$config->host = 'whatever';

		(new TS3Client($config))->connect();
	}

	/**
	 * @expectedException \chillerlan\Teamspeak\TS3ClientException
	 * @expectedExceptionMessage not connected
	 */
	public function testSendNotConnectedException(){
		$this->ts3client->send('');
	}

	/**
	 * @expectedException \chillerlan\Teamspeak\TS3ClientException
	 * @expectedExceptionMessage empty command
	 */
	public function testSendEmptyCommandException(){
		$this->ts3client->connect();
		$this->ts3client->send('');
	}

	public function testDisconnect(){
		$this->ts3client->connect();

		$response = $this->ts3client->disconnect();

		if(is_array($response)){
			$this->assertSame(2, count($response));

			/** @var $r \chillerlan\Teamspeak\TS3Response */
			foreach($response as $i => $r){
				$this->assertInstanceOf(TS3Response::class, $r);

				if($i === 0){
					$this->assertSame('logout', $r->commandlist[0]);
				}

				if($i === 1){
					$this->assertSame('quit', $r->commandlist[0]);
				}

				$this->assertSame(0, $r->error->id);
				$this->assertSame('ok', $r->error->msg);
			}

		}

	}

}
