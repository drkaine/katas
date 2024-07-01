<?php

declare(strict_types = 1);

use Advent\Day9\Client;

describe('Client should', function (): void {
	beforeEach(function (): void {
		$this->statementWanted = "Tenet Deluxe Edition for 45.99€\n" .
		"Inception for 30.50€\n" .
		"The Dark Knight for 30.50€\n" .
		"Interstellar for 23.98€\n" .
		'Total : 130.97€';

		$this->client = new Client([
			['key' => 'Tenet Deluxe Edition', 'value' => 45.99, ],
			['key' => 'Inception', 'value' => 30.50, ],
			['key' => 'The Dark Knight', 'value' => 30.50, ],
			['key' => 'Interstellar', 'value' => 23.98, ],
		]);

		$this->statement = $this->client->toStatement();
	});

	test('give the statement and the total amount', function (): void {
		expect($this->client->getTotalAmount())->toEqualWithDelta(130.97, 2);

		expect(trim($this->statement))->toBe($this->statementWanted);
	});

	test('not cumul the total amount with multiple statement', function (): void {
		$this->client->toStatement();

		expect($this->client->getTotalAmount())->toEqualWithDelta(130.97, 2);
	});
});
