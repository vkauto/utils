<?php

namespace VKauto\Utils;

class QueryBuilder
{
	public static function buildURL($method, array $array = array())
	{
		$url = "https://api.vk.com/method/{$method}";

		foreach ($parameters as $parameter => $value)
		{
			$prefix = ($parameter == array_keys($parameters)[0]) ? '?' : '&';
			$url .= sprintf('%s%s=%s', $prefix, $parameter, urlencode($value));
		}

		return $url;
	}
}
