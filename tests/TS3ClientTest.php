<?php
/**
 * @created      09.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\TeamspeakTest;

use chillerlan\DotEnv\DotEnv;
use chillerlan\Settings\SettingsContainerInterface;
use chillerlan\Teamspeak\{TS3Client, TS3ClientException, TS3Config};
use PHPUnit\Framework\TestCase;

class TS3ClientTest extends TestCase{

	protected TS3Client $ts3client;
	protected SettingsContainerInterface $ts3config;
	protected DotEnv $env;

	protected function setUp():void{
		$this->env = (new DotEnv(__DIR__.'/../config', '.env', false))->load();
		$this->ts3config = new TS3Config;

		$this->ts3config->host           = $this->env->get('TS3_HOST');
		$this->ts3config->port           = $this->env->get('TS3_PORT');
		$this->ts3config->vserver        = $this->env->get('TS3_VSERVER');
		$this->ts3config->query_user     = $this->env->get('TS3_QUERY_USER');
		$this->ts3config->query_password = $this->env->get('TS3_QUERY_PASS');

		$this->ts3client = new TS3Client($this->ts3config);
	}

	public function testInstance():void{
		$this->assertInstanceOf(SettingsContainerInterface::class, $this->ts3config);
		$this->assertInstanceOf(TS3Client::class, $this->ts3client);
	}

	public function testConnectException():void{
		$this->expectException(TS3ClientException::class);
		$this->expectExceptionMessage('could not connect: #');

		$config = new TS3Config;

		$config->host = 'whatever';

		(new TS3Client($config))->connect();
	}

	public function testSendNotConnectedException():void{
		$this->expectException(TS3ClientException::class);
		$this->expectExceptionMessage('not connected');

		$this->ts3client->send('');
	}

	public function testSendEmptyCommandException():void{
		$this->expectException(TS3ClientException::class);
		$this->expectExceptionMessage('empty command');

		$this->ts3client->connect();
		$this->ts3client->send('');
	}

}
