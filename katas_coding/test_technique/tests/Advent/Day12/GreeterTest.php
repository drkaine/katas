<?php

declare(strict_types = 1);

use Advent\Day12\Casual;
use Advent\Day12\Formal;
use Advent\Day12\Greeter;
use Advent\Day12\Intimate;

describe('Greeter', function (): void {
	beforeEach(function (): void {
		$this->greeter = new Greeter;
	});

	test('says Hello', function (): void {
		expect($this->greeter->greet())->toBe('Hello.');
	});

	test('says Hello Formally', function (): void {
		$this->greeter->setFormality(new Formal);
		expect($this->greeter->greet())->toBe('Good evening, sir.');
	});

	test('says Hello Casually', function (): void {
		$this->greeter->setFormality(new Casual);
		expect($this->greeter->greet())->toBe('Sup bro?');
	});

	test('says Hello Intimately', function (): void {
		$this->greeter->setFormality(new Intimate);
		expect($this->greeter->greet())->toBe('Hello Darling!');
	});
});
