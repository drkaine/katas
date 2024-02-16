<?php

declare(strict_types = 1);

namespace Advent\Day3;

class Population
{
	public function __construct(
		public array $persons,
	) {
	}

	public function getPersonWithYoungestPet(): string
	{
		$this->getYoungestPetsPerson();

		$array = [];

		foreach ($this->persons as $person) {
			$array[$person->firstName] = $person->youngestPetAge;
		}

		asort($array);

		return array_key_first($array);
	}

	private function getYoungestPetsPerson(): void
	{
		$get = function (Person $person) {
			return $person->getYoungestPet();
		};

		array_map($get, $this->persons);
	}
}
