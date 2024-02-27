<?php

declare(strict_types = 1);

use Advent\Day10\FizzBuzz;

describe('FizzBuzz should return', function (): void {
	beforeEach(function (): void {
		$this->fizzBuzz = new FizzBuzz;
	});

	dataset('validInputOutput', function () {
		return [
			[1, 1],
			[67, 67],
			[82, 82],
			[3, 'Fizz'],
			[66, 'Fizz'],
			[99, 'Fizz'],
			[5, 'Buzz'],
			[50, 'Buzz'],
			[85, 'Buzz'],
			[15, 'FizzBuzz'],
			[30, 'FizzBuzz'],
			[45, 'FizzBuzz'],
		];
	});

	test('its representation', function (int $input, $output): void {
		expect($this->fizzBuzz->fizzBuzz($input))->toBe($output);
	})->with('validInputOutput');

	dataset('invalidInputOutput', function () {
		return [
			0, -
			1,
			101,
		];
	});

	test('an error for numbers out of range like', function (int $input): void {
		$fizzbuzz = new FizzBuzz;
		expect(function () use ($fizzbuzz, $input): void {
			$fizzbuzz->fizzBuzz($input);
		})->toThrow(Exception::class, 'Input is out of range');
	})->with('invalidInputOutput');
});
