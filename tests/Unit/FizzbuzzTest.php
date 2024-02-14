<?php

declare(strict_types = 1);

use Advent\Day2\FizzBuzz;

beforeEach(function (): void {
	$this->fizzBuzz = new FizzBuzz;
});

describe('FizzBuzz should return', function (): void {
	test('the given number for 1', function (): void {
		expect($this->fizzBuzz->fizzBuzz(1))->toBe(1);
	});

	test('the given number for 67', function (): void {
		expect($this->fizzBuzz->fizzBuzz(67))->toBe(67);
	});

	test('the given number for 82', function (): void {
		expect($this->fizzBuzz->fizzBuzz(82))->toBe(82);
	});

	test('Fizz for 3', function (): void {
		expect($this->fizzBuzz->fizzBuzz(3))->toBe('Fizz');
	});

	test('Fizz for 66', function (): void {
		expect($this->fizzBuzz->fizzBuzz(66))->toBe('Fizz');
	});

	test('Fizz for 99', function (): void {
		expect($this->fizzBuzz->fizzBuzz(99))->toBe('Fizz');
	});

	test('Buzz for 5', function (): void {
		expect($this->fizzBuzz->fizzBuzz(5))->toBe('Buzz');
	});

	test('Buzz for 55', function (): void {
		expect($this->fizzBuzz->fizzBuzz(55))->toBe('Buzz');
	});

	test('Buzz for 95', function (): void {
		expect($this->fizzBuzz->fizzBuzz(95))->toBe('Buzz');
	});

	test('Buzz for 15', function (): void {
		expect($this->fizzBuzz->fizzBuzz(15))->toBe('FizzBuzz');
	});

	test('Buzz for 30', function (): void {
		expect($this->fizzBuzz->fizzBuzz(30))->toBe('FizzBuzz');
	});

	test('Buzz for 45', function (): void {
		expect($this->fizzBuzz->fizzBuzz(45))->toBe('FizzBuzz');
	});

	test('an error for 101', function (): void {
		$fizzbuzz = new FizzBuzz;
		expect(function () use ($fizzbuzz): void {
			$fizzbuzz->fizzBuzz(101);
		})->toThrow(Exception::class, 'Input is out of range');

	});

	test('an error for 0', function (): void {
		$fizzbuzz = new FizzBuzz;
		expect(function () use ($fizzbuzz): void {
			$fizzbuzz->fizzBuzz(0);
		})->toThrow(Exception::class, 'Input is out of range');

	});

	test('an error for -1', function (): void {
		$fizzbuzz = new FizzBuzz;
		expect(function () use ($fizzbuzz): void {
			$fizzbuzz->fizzBuzz(-1);
		})->toThrow(Exception::class, 'Input is out of range');

	});
});
