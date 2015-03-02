<?php

namespace VKauto\Utils;

use Exception;
use VKauto\Utils\QueryBuilder;
use VKauto\Utils\Request;

class Auth
{
	public static function directly($login, $password)
	{

		$account = Request::VK(QueryBuilder::buildAuthURL($login, $password));

		if (isset($account->error))
		{
			echo($account->error_description . PHP_EOL);
			die;
		}

		return $account;
	}
}
