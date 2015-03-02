<?php

namespace VKauto\Utils;

use Exception;

class Request
{
	public static function get($url)
	{
		$options = [
			CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0',
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			// CURLOPT_HEADER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_CONNECTTIMEOUT => 0,
			CURLOPT_TIMEOUT => 400,
			CURLOPT_POST => false
		];

		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);

		return $response;
	}

	public static function VK($url)
	{
		$response = json_decode(self::get($url), false);

		return $response;
	}
}
