<?php

namespace VKauto\Utils;

class Log
{
	public static function write($data, $prefixes = array())
	{
		$text = @date("[H:i:s d.m.Y]\x20");

		if (is_array($prefixes) and !empty(array_filter($prefixes))) {
			foreach ($prefixes as $prefix)
			{
				$text .= "[{$prefix}]\x20";
			}
		}

		$text .= $data;

		echo($text . PHP_EOL);
	}
}
