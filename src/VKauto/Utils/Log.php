<?php

namespace VKauto\Utils;

class Log
{
	/**
	 * Метод отправляет сообщение в консоль
	 * @param  string $data
	 * @param  array  $prefixes
	 */
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

		# Для вывода в консоль Windows
		$text = mb_convert_encoding($text, 'cp1251');

		echo($text . PHP_EOL);
	}
}
