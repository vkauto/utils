<?php

namespace VKauto\Utils;

use VKauto\CaptchaRecognition\Captcha;

class Request
{
	/**
	 * GET запрос
	 * @param  string $url
	 * @return string
	 */
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

	/**
	 * POST запрос
	 * @param  string $url
	 * @param  array  $data
	 * @return string
	 */
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

	/**
	 * Отдельный метод для отправки запросов API.VK.COM
	 * @param string       $url
	 * @param Captcha|null $captcha
	 * @return stdClass
	 */
	public static function VK($url, Captcha $captcha = null)
	{
		$response = json_decode(self::get($url), false);

		if (isset($response->error))
		{
			if (isset($response->error->error_code))
			{
				switch($response->error->error_code)
				{
					case 14:
						if (is_null($captcha))
						{
							break;
						}

						if ($captchaText = $captcha->recognize($response->error->captcha_img) != false)
						{
							$queryData = QueryBuilder::parseURL($url);

							$queryData['parameters']['captcha_sid'] = $response->error->captcha_sid;
							$queryData['parameters']['captcha_text'] = $captchaText;

							return self::VK(QueryBuilder::buildURL($queryData['method'], $queryData['parameters']));
						}
						else
						{
							break;
						}

					default:
						break;
				}
			}
		}

		return $response;
	}
}
