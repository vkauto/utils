<?php

namespace VKauto\Utils;

class Account
{
	public $access_token;

	public $user_id;

	public function __construct($access_token, $user_id)
	{
		$this->access_token = $access_token;
		$this->user_id		= $user_id;
	}
}
