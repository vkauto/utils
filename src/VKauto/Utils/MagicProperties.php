<?php

namespace VKauto\Utils;

trait MagicProperties
{
	/**
	 * Массив с различными данными
	 * @var array
	 */
	private $data;

	/**
	 * Магический метод, возвращающий данные из массива
	 * @param  $property
	 * @return mixed
	 */
	public function __get($property)
	{
		if (!strpos($property, '_'))
		{
			$pieces = preg_split('/(?=[A-Z])/', $property);

			$property = strtolower(implode('_', $pieces));
		}

		if (isset($this->data[$property]))
		{
			return $this->data[$property];
		}
	}
}
