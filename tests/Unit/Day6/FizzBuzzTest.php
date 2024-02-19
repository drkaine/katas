<?php

declare(strict_types = 1);

use Advent\Day6\FizzBuzz;

beforeEach(function (): void {
	$this->fizzBuzz = new FizzBuzz;
});

describe('FizzBuzz with', function (): void {
	dataset('validInputOutput', function () {
		return (require 'Dataset.php')['validData'];
	});

	test('dataset for normal use', function (int $input, $output): void {
		expect($this->fizzBuzz->fizzBuzz($input))->toBe($output);
	})->with('validInputOutput');

	dataset('invalidInputOutput', function () {
		return (require 'Dataset.php')['invalidData'];
	});

	test('dataset for limit testing', function (int $input, string $output): void {
		$fizzbuzz = new FizzBuzz;
		expect(function () use ($fizzbuzz, $input): void {
			$fizzbuzz->fizzBuzz($input);
		})->toThrow(Exception::class, $output);
	})->with('invalidInputOutput');
});
