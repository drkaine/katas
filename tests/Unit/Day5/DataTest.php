<?php

declare(strict_types = 1);

use Advent\Day5\Person;
use Advent\Day5\Pet;
use Advent\Day5\PetType;

return [
	'population' => [
		new Person('Peter', 'Griffin', [new Pet(PetType::Cat, 'Tabby', 2)]),
		new Person('Stewie', 'Griffin', [new Pet(PetType::Cat, 'Dolly', 3), new Pet(PetType::Dog, 'Brian', 9)]),
		new Person('Joe', 'Swanson', [new Pet(PetType::Dog, 'Spike', 4)]),
		new Person('Lois', 'Griffin', [new Pet(PetType::Snake, 'Serpy', 1)]),
		new Person('Meg', 'Griffin', [new Pet(PetType::Bird, 'Tweety', 1)]),
		new Person('Chris', 'Griffin', [new Pet(PetType::Turtle, 'Speedy', 4)]),
		new Person('Cleveland', 'Brown', [new Pet(PetType::Hamster, 'Fuzzy', 1), new Pet(PetType::Hamster, 'Wuzzy', 2)]),
		new Person('Glenn', 'Quagmire', []),
	],
	'formatPopulation' => 'Peter Griffin who owns : Tabby \n' .
	'Stewie Griffin who owns : Dolly Brian \n' .
	'Joe Swanson who owns : Spike \n' .
	'Lois Griffin who owns : Serpy \n' .
	'Meg Griffin who owns : Tweety \n' .
	'Chris Griffin who owns : Speedy \n' .
	'Cleveland Brown who owns : Fuzzy Wuzzy \n' .
	'Glenn Quagmire',
];
