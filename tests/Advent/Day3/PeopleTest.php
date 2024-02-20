<?php

declare(strict_types = 1);

describe('population', function (): void {

	beforeEach(function (): void {
		$this->population = require 'DataTest.php';
	});

	test('Lois owns the youngest pet', function (): void {
		$filtered = $this->population->getPersonWithYoungestPet();

		expect($filtered)->not->toBeNull();
		expect($filtered)->toBe('Lois');
	});
});
