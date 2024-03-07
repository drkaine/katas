<?php

declare(strict_types = 1);

namespace Advent\Day23\Trip;

use Advent\Day23\exception\UserNotLoggedInException;
use Advent\Day23\user\UserSession;

class TripService
{
	public function getTripsByUser($user)
	{
		$tripList = [];
		$loggedUser = UserSession::getInstance()->getLoggedUser();
		$isFriend = false;
		if (null !== $loggedUser) {
			foreach ($user->getFriends() as $friend) {
				if ($friend->equals($loggedUser)) {
					$isFriend = true;

					break;
				}
			}
			if ($isFriend) {
				$tripList = TripDAO::findTripsByUser($user);
			}

			return $tripList;
		}

		throw new UserNotLoggedInException;

	}
}
