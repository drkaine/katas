<?php

declare(strict_types = 1);

use Advent\Day3\Person;
use Advent\Day3\Pet;
use Advent\Day3\PetType;
use Advent\Day3\Population;

return new Population([
	new Person('Peter', 'Griffin', [new Pet(PetType::Cat, 'Tabby', 2)]),
	new Person('Stewie', 'Griffin', [new Pet(PetType::Cat, 'Dolly', 3), new Pet(PetType::Dog, 'Brian', 9)]),
	new Person('Joe', 'Swanson', [new Pet(PetType::Dog, 'Spike', 4)]),
	new Person('Lois', 'Griffin', [new Pet(PetType::Snake, 'Serpy', 1)]),
	new Person('Meg', 'Griffin', [new Pet(PetType::Bird, 'Tweety', 1)]),
	new Person('Chris', 'Griffin', [new Pet(PetType::Turtle, 'Speedy', 4)]),
	new Person('Cleveland', 'Brown', [new Pet(PetType::Hamster, 'Fuzzy', 1), new Pet(PetType::Hamster, 'Wuzzy', 2)]),
	new Person('Glenn', 'Quagmire', []),
]);
