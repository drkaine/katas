<?php

declare(strict_types = 1);

namespace Advent\Day23\user;

class User
{
	private $trips = [];

	private $friends = [];

	public function getFriends()
	{
		return $this->friends;
	}

	public function addFriend($user): void
	{
		$this->friends[] = $user;
	}

	public function addTrip($trip): void
	{
		$this->trips[] = $trip;
	}

	public function trips()
	{
		return $this->trips;
	}
}
