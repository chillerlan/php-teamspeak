<?php
/**
 * Class TS3Response
 *
 * @created      09.10.2016
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2016 Smiley
 * @license      MIT
 */

namespace chillerlan\Teamspeak;

use stdClass;
use function array_map, array_pop, chr, explode, is_numeric, preg_match, property_exists, str_replace, strpos, trim;

/**
 * @property string    $commandline
 * @property array     $commandlist
 * @property string    $raw
 * @property array     $data
 * @property \stdClass $error
 */
final class TS3Response{

	private string $commandline;
	private array $commandlist = [];
	private string $raw;
	private array $data = [];
	private stdClass $error;

	/**
	 * TS3Response constructor.
	 */
	public function __construct(string $command, string $raw){
		$this->commandline = $command;
		$this->raw         = $raw;

		$this->error       = new stdClass;
		$this->error->id   = null;
		$this->error->msg  = null;

		$this->parse_response();
	}

	/**
	 * @return mixed|null
	 */
	public function __get(string $property){

		if(property_exists($this, $property)){
			return $this->{$property};
		}

		return null;
	}

	/**
	 *
	 */
	private function parse_response():void{
		$this->commandlist = array_map(fn($c) => trim($c, "\r\n\t- "), explode(' ', trim($this->commandline)));
		$this->data        = array_map(fn($d) => trim($d), explode("\n", trim($this->raw)));

		if(preg_match('/^(:?error id=)(?P<id>[\d]+)(:? msg=)(?P<msg>.*)$/isU', array_pop($this->data), $match) > 0){
			$this->error->id  = (int)$match['id'];
			$this->error->msg = $match['msg'];
		}

	}

	/**
	 * @return \stdClass[]|\stdClass
	 */
	public function parseList(){
		return self::parse_list($this->data[0] ?? '');
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
	public static function parse_kv(string $str):stdClass{
		$str = explode(' ', $str);
		$r   = new stdClass;

		foreach($str as $pair){
			$kv  = explode('=', $pair);
			$val = isset($kv[1]) && !empty($kv[1]) ? self::unescape($kv[1]) : null;

			if(is_numeric($val)){
				$val += 0;
			}

			$r->{$kv[0]} = $val;
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
	 * @return \stdClass[]|\stdClass
	 */
	public static function parse_list(string $str){

		if(strpos($str, '|') !== false){
			$str = explode('|', $str);
			$arr = [];

			foreach($str as $line){
				$arr[] = self::parse_kv($line);
			}

			return $arr;
		}

		return self::parse_kv($str);
	}

	/**
	 * @phan-suppress PhanTypeMismatchArgumentNullableInternal
	 */
	public static function unescape(string $str = null, bool $reverse = null):string{
		$search  = ["\\\\", "\/", "\s", "\p", "\a", "\b", "\f", "\n", "\r", "\t", "\v"];
		$replace = [chr(92), chr(47), chr(32), chr(124), chr(7), chr(8), chr(12), chr(10), chr(3), chr(9), chr(11)];

		return $reverse
			? str_replace($replace, $search, $str)
			: str_replace($search, $replace, $str);
	}

}
