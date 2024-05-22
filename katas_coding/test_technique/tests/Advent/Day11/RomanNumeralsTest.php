<?php

declare(strict_types = 1);

use Advent\Day11\RomanNumerals;

describe('RomanNumeral conversion', function (): void {
	beforeEach(function (): void {
		$this->romanNumerals = new RomanNumerals;
	});

	dataset('RomanNumeral', function () {
		return [
			[1, 'I'],
			[3, 'III'],
			[4, 'IV'],
			[5, 'V'],
			[10, 'X'],
			[13, 'XIII'],
			[50, 'L'],
			[100, 'C'],
			[500, 'D'],
			[1000, 'M'],
			[2499, 'MMCDXCIX'],
		];
	});

	test('generates roman for numbers', function ($number, $expectedRoman): void {
		$result = $this->romanNumerals->convert($number);
		expect($result)->toEqual($expectedRoman);
	})->with('RomanNumeral');

	test('fails for any number out of range', function (): void {
		$invalidNumbers = [-1000, -12, -5467, 4000, 4050, 6841, 10000];

		foreach ($invalidNumbers as $number) {
			expect($this->romanNumerals->convert($number))->toBe(null);
		}
	});

	test('returns only valid symbols for valid numbers', function (): void {
		$validNumbers = range(1, 3999);

		foreach ($validNumbers as $validNumber) {
			$roman = $this->romanNumerals->convert($validNumber);

			if (method_exists($this, 'assertMatchesRegularExpression')) {
				$this->assertMatchesRegularExpression('/^[IVXLCDM]+$/', $roman);
			} else {
				$this->assertRegExp('/^[IVXLCDM]+$/', $roman);
			}
		}
	});
});
