<?php

declare(strict_types = 1);

namespace Advent\Day10;

use Exception;

class FizzBuzz
{
	private int $min = 0;

	private int $max = 100;

	private int $fizz = 3;

	private int $buzz = 5;

	private int $fizzBuzz = 15;

	public function fizzbuzz(int $input): string | int
	{
		return match (true) {
			$this->isOutOfRange($input) => throw new Exception('Input is out of range'),
			$this->is($this->fizzBuzz, $input) => 'FizzBuzz',
			$this->is($this->fizz, $input) => 'Fizz',
			$this->is($this->buzz, $input) => 'Buzz',
			default => $input,
		};
	}

	public function is(int $divisor, int $input): bool
	{
		return $input % $divisor === 0;
	}

	public function isOutOfRange(int $input): bool
	{
		return $input <= $this->min || $input > $this->max;
	}
}
