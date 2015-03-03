<?php

namespace VKauto\Utils;

class QueryBuilder
{
	public static function buildURL($method, array $parameters = array())
	{
		$url = "https://api.vk.com/method/{$method}";

		foreach ($parameters as $parameter => $value)
		{
			$prefix = ($parameter == array_keys($parameters)[0]) ? '?' : '&';
			$url .= sprintf('%s%s=%s', $prefix, $parameter, urlencode($value));
		}

		return $url;
	}

	public static function buildAuthURL($login, $password)
	{
		return "https://oauth.vk.com/token?grant_type=password&client_id=2274003&client_secret=hHbZxrka2uZ6jB1inYsH&username={$login}&password={$password}";
	}
}
