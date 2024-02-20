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
		array_map([$this, 'getYoungest'], $this->pets);
	}

	private function getYoungest(Pet $pet): void
	{
		if ($pet->age < $this->youngestPetAge) {
			$this->youngestPetAge = $pet->age;
		}
	}
}
