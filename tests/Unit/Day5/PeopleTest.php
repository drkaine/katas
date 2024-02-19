<?php

declare(strict_types = 1);

use Tests\Unit\Day5\PopulationTesting;

describe('population', function (): void {

	beforeEach(function (): void {
		$dataTest = require 'DataTest.php';
		$this->population = $dataTest['population'];
		$this->formatPopulation = $dataTest['formatPopulation'];
		$this->populationTesting = new PopulationTesting;
	});

	test('Lois owns the youngest pet', function (): void {
		$filteredPopulation = $this->populationTesting->getTheYoungestPetOwner($this->population);

		expect($filteredPopulation)->not->toBeNull();
		expect($filteredPopulation->firstName)->toBe('Lois');
	});

	test('we should be able to represent people with their pets', function (): void {
		$response = $this->populationTesting->formatPopulation($this->population);
		expect($response)->toBe($this->formatPopulation);
	});
});
