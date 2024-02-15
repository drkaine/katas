<?php

declare(strict_types = 1);

use Advent\Day10\FizzBuzz;

beforeEach(function (): void {
	$this->fizzBuzz = new FizzBuzz;
});

// describe('FizzBuzz should return', function (): void {
// 	test('its representation', function (): void {
// 		expect([
// 			[1 => 1],
// 			[67 => 67],
// 			[82 => 82],
// 			[3 => 'Fizz'],
// 			[66 => 'Fizz'],
// 			[99 => 'Fizz'],
// 			[5 => 'Buzz'],
// 			[50 => 'Buzz'],
// 			[85 => 'Buzz'],
// 			[15 => 'FizzBuzz'],
// 			[30 => 'FizzBuzz'],
// 			[45 => 'FizzBuzz'],
// 		])->
// 		sequence(
// 			fn ($input, $return) => $this->fizzbuzz->fizzbuzz($input->toBe($return))
// 		);
// 	});

// 	test('an error for numbers out of range like', function (): void {
// 		expect([
// 			[0],
// 			[-1],
// 			[101],
// 		])->
// 		sequence(fn ($input) => $this->fizzbuzz->fizzbuzz($input[0]->toThrow('Input is out of range')));
// 	});
// });
