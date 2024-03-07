<?php

declare(strict_types = 1);

namespace Advent\Day23\user;

use Advent\Day23\exception\CollaboratorCallException;

class UserSession
{
	private static $userSession;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (!isset(self::$userSession)) {
			self::$userSession = new UserSession;
		}

		return self::$userSession;
	}

	public function getLoggedUser(): void
	{
		throw new CollaboratorCallException('UserSession.getLoggedUser() should not be called in a unit test');
	}
}
