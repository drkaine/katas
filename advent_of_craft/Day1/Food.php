<?php

declare(strict_types = 1);

namespace Advent\Day1;

use Carbon\Carbon;
use Ramsey\Uuid\UuidInterface;

class Food
{
	public function __construct(
		private readonly Carbon $expirationDate,
		private readonly bool $approvedForConsumption,
		private readonly ?UuidInterface $inspectorId,
	) {
	}

	public function isEdible(Carbon $now): bool
	{
		if ($this->isEpired($now)) {
			return false;
		}

		if ($this->hasNotBeenInspected()) {
			return false;
		}

		return $this->canBeConsummed();
	}

	private function isEpired(Carbon $now): bool
	{
		return $this->expirationDate <= $now;
	}

	private function hasNotBeenInspected(): bool
	{
		return null === $this->inspectorId;
	}

	private function canBeConsummed(): bool
	{
		return $this->approvedForConsumption;
	}
}
