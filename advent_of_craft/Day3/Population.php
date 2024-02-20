<?php

declare(strict_types = 1);

namespace Advent\Day3;

class Population
{
	private array $youngestPetAgeArray = [];

	public function __construct(
		public array $persons,
	) {
	}

	public function getPersonWithYoungestPet(): string
	{
		$this->getYoungestPetsPerson();

		array_map([$this, 'addYougestPetAge'], $this->persons);
		asort($this->youngestPetAgeArray);

		return array_key_first($this->youngestPetAgeArray);
	}

	private function getYoungestPetsPerson(): void
	{
		array_map([$this, 'getYoungestPet'], $this->persons);
	}

	private function getYoungestPet(Person $person): void
	{
		$person->getYoungestPet();
	}

	private function addYougestPetAge(Person $person): void
	{
		$this->youngestPetAgeArray[$person->firstName] = $person->youngestPetAge;
	}
}
