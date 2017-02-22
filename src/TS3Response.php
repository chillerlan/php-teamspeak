<?php
/**
 * Class TS3Response
 *
 * @filesource   TS3Response.php
 * @created      09.10.2016
 * @package      chillerlan\Teamspeak
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

/**
 * @property string    $commandline
 * @property array     $commandlist
 * @property string    $raw
 * @property array     $data
 * @property \stdClass $error
 */
class TS3Response{

	/**
	 * @var string
	 */
	protected $commandline;

	/**
	 * @var array
	 */
	protected $commandlist = [];

	/**
	 * @var string
	 */
	protected $raw;

	/**
	 * @var array
	 */
	protected $data = [];

	/**
	 * @var \stdClass
	 */
	protected $error;

	/**
	 * TS3Response constructor.
	 *
	 * @param string $command
	 * @param string $raw
	 */
	public function __construct(string $command, string $raw){
		$this->commandline = $command;
		$this->raw         = $raw;

		$this->parse_response();
	}

	/**
	 * @param $property
	 *
	 * @return mixed
	 */
	public function __get(string $property){

		if(property_exists($this, $property)){
			return $this->{$property};
		}

		return false;
	}

	/**
	 *
	 */
	protected function parse_response(){

		$this->commandlist = array_map(function($c){
			return trim($c, "\r\n\t- ");
		}, explode(' ', trim($this->commandline)));

		$this->data = array_map(function($d){
			return trim($d);
		}, explode("\n", trim($this->raw)));

		$this->error = new \stdClass;

		$this->error->id  = null;
		$this->error->msg = null;

		if(preg_match(
			   '/^(:?error id=)(?P<id>[\d]+)(:? msg=)(?P<msg>.*)$/isU',
			   array_pop($this->data),
			   $match
		   ) > 0
		){
			$this->error->id  = (int)$match['id'];
			$this->error->msg = $match['msg'];
		}

	}

	/**
	 * parse space separated k/v pairs
	 *
	 * key1=val1 key2=val2 ...
	 *
	 * @param string $str
	 *
	 * @return \stdClass
	 */
	public function parse_kv(string $str = null):\stdClass {
		$str = !empty($str) ? $str : $this->data[0];
		$str = explode(' ', $str);

		$r = new \stdClass;

		foreach($str as $pair){
			$kv = explode('=', $pair);

			$r->{$kv[0]} = isset($kv[1]) && !empty($kv[1])
				? $this->unescape($kv[1])
				: null;
		}

		return $r;
	}

	/**
	 * parse pipe separated lines
	 *
	 * key1=val1 | key2=val2 | ...
	 *
	 * @param string $str
	 *
	 * @return array|\stdClass
	 */
	public function parse_list(string $str = null) {
		$str = !empty($str) ? $str : $this->data[0];

		if(strpos($str, '|')){
			$str = explode('|', $str);

			$arr = [];

			foreach($str as $line){
				$arr[] = $this->parse_kv($line);
			}

			return $arr;
		}

		return $this->parse_kv($str);
	}

	/**
	 * @param string $str
	 * @param bool   $reverse
	 *
	 * @return string $str
	 * @internal param bool $reverse
	 *
	 */
	public function unescape(string $str = null, bool $reverse = false):string {
		$search  = ["\\\\", "\/", "\s", "\p", "\a", "\b", "\f", "\n", "\r", "\t", "\v"];
		$replace = [chr(92), chr(47), chr(32), chr(124), chr(7), chr(8), chr(12), chr(10), chr(3), chr(9), chr(11)];

		return !$reverse
			? str_replace($search, $replace, $str)
			: str_replace($replace, $search, $str);
	}

}
