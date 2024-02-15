<?php

declare(strict_types = 1);

use Advent\Day9\Client;

describe('Client Tests', function (): void {
	beforeEach(function (): void {
		$this->client = new Client([
			'Tenet Deluxe Edition' => 45.99,
			'Inception' => 30.50,
			'The Dark Knight' => 30.50,
			'Interstellar' => 23.98,
		]);
	});

	test('Client Should Return Statement', function (): void {
		$statement = $this->client->toStatement();

		expect($this->client->getTotalAmount())->toEqualWithDelta(130.97, 2);
		expect(trim($statement))->toEqual(
			"Tenet Deluxe Edition for 45.99€\n" .
			"Inception for 30.50€\n" .
			"The Dark Knight for 30.50€\n" .
			"Interstellar for 23.98€\n" .
			'Total : 130.97€'
		);
	});
});
