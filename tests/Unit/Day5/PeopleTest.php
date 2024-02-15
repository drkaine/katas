<?php

declare(strict_types = 1);

use Advent\Day5\Person;
use Advent\Day5\Pet;
use Advent\Day5\PetType;

describe('population', function (): void {

	beforeEach(function (): void {
		$this->population = [
			new Person('Peter', 'Griffin', [new Pet(PetType::Cat, 'Tabby', 2)]),
			new Person('Stewie', 'Griffin', [new Pet(PetType::Cat, 'Dolly', 3), new Pet(PetType::Dog, 'Brian', 9)]),
			new Person('Joe', 'Swanson', [new Pet(PetType::Dog, 'Spike', 4)]),
			new Person('Lois', 'Griffin', [new Pet(PetType::Snake, 'Serpy', 1)]),
			new Person('Meg', 'Griffin', [new Pet(PetType::Bird, 'Tweety', 1)]),
			new Person('Chris', 'Griffin', [new Pet(PetType::Turtle, 'Speedy', 4)]),
			new Person('Cleveland', 'Brown', [new Pet(PetType::Hamster, 'Fuzzy', 1), new Pet(PetType::Hamster, 'Wuzzy', 2)]),
			new Person('Glenn', 'Quagmire', []),
		];
	});

	test('Lois owns the youngest pet', function (): void {
		$filtered = $this->population;

		usort($filtered, function ($person1, $person2) {
			$person1_pet_age = $person1->pets[0]->age ?? PHP_INT_MAX;
			$person2_pet_age = $person2->pets[0]->age ?? PHP_INT_MAX;

			if ($person1_pet_age < $person2_pet_age) {
				return -1;
			}
			if ($person1_pet_age > $person2_pet_age) {
				return 1;
			}

			return 0;
		});

		$filtered = reset($filtered);

		expect($filtered)->not->toBeNull();
		expect($filtered->firstName)->toBe('Lois');
	});

	test('we should be able to represent people with their pets', function (): void {
		$response = formatPopulation($this->population);
		expect($response)->toBe('Peter Griffin who owns : Tabby \n' .
			'Stewie Griffin who owns : Dolly Brian \n' .
			'Joe Swanson who owns : Spike \n' .
			'Lois Griffin who owns : Serpy \n' .
			'Meg Griffin who owns : Tweety \n' .
			'Chris Griffin who owns : Speedy \n' .
			'Cleveland Brown who owns : Fuzzy Wuzzy \n' .
			'Glenn Quagmire');
	});
});

function formatPopulation(array $population): string
{
	$response = '';

	for ($i = 0; count($population) > $i; $i++) {
		$person = $population[$i];
		$response .= $person->firstName . ' ' . $person->lastName;

		if (count($person->pets) > 0) {
			$response .= ' who owns : ';
			foreach ($person->pets as $pet) {
				$response .= $pet->name . ' ';
			}
		}

		if (count($population) - 1 > $i) {
			$response .= '\n';
		}
	}

	return $response;
};

function comparePetAgeForPersons(Person $person1, Person $person2): int
{
	if (youngestPetAgeForThePerson($person1) < youngestPetAgeForThePerson($person2)) {
		return -1;
	}
	if (youngestPetAgeForThePerson($person1) <= youngestPetAgeForThePerson($person2)) {
		return 0;
	}

	return 1;
};

function youngestPetAgeForThePerson(Person $person): int
{
	usort($person->pets, function ($a, $b) {
		return $a->age - $b->age;
	});

	return $person->pets[0]->age ?? PHP_INT_MAX;
}

function ageDifference(Pet $pet1, Pet $pet2): int
{
	return $pet1->age - $pet2->age;
}
