<?php

declare(strict_types = 1);

namespace Advent\Day23\trip;

use Advent\Day23\exception\CollaboratorCallException;

class TripDAO
{
	public static function findTripsByUser($user): void
	{
		throw new CollaboratorCallException('TripDAO should not be invoked on a unit test.');
	}
}
