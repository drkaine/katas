<?php

declare(strict_types = 1);

namespace Advent\Day3;

class Person
{
	public function __construct(
		public readonly string $firstName,
		public readonly string $lastName,
		public readonly array $pets,
		public int $youngestPetAge = PHP_INT_MAX,
	) {
	}

	public function getYoungestPet(): void
	{
		foreach ($this->pets as $pet) {
			if ($pet->age < $this->youngestPetAge) {
				$this->youngestPetAge = $pet->age;
			}
		}
	}
}
