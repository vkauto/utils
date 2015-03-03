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

	public static function post($url, $data = array())
	{
		$options = [
			CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0',
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_CONNECTTIMEOUT => 0,
			CURLOPT_TIMEOUT => 400,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $data
		];

		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);

		return $response;
	}

	public static function VK($url)
	{
		$response = json_decode(self::get($url), false);

		if (isset($response->error))
		{
			if (isset($response->error->error_code))
			{
				switch($response->error->error_code)
				{
					case 14:
						die("NEEDED SOME CAPTCHA. PLEASE WAIT UNTIL I WILL WRITE ANOTHER ONE PACKAGE.");
						break;

					default:
						break;
				}
			}
		}

		return $response;
	}
}
