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
		if ($this->isOutOfRange($input)) {
			throw new Exception('Input is out of range');
		}

		return $this->convertSafely($input);
	}

	public function convertSafely(int $input): string | int
	{
		if ($this->is($this->fizzBuzz, $input)) {
			return 'FizzBuzz';
		}
		if ($this->is($this->fizz, $input)) {
			return 'Fizz';
		}
		if ($this->is($this->buzz, $input)) {
			return 'Buzz';
		}

		return $input;
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
