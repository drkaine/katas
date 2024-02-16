<?php

declare(strict_types = 1);

namespace Advent\Day2;

use Exception;

class FizzBuzz
{
	private int $min = 0;

	private int $max = 100;

	private int $fizz = 3;

	private int $buzz = 5;

	private int $modulo = 0;

	private string $outOfRange = 'Input is out of range';

	private string $stringFizz = 'Fizz';

	private string $stringBuzz = 'Buzz';

	public function fizzBuzz(int $input): string | int
	{
		$this->validateInput($input);

		return $this->convertResult($input);
	}

	private function validateInput(int $input): void
	{
		if ($this->min >= $input || $this->max < $input) {
			throw new Exception($this->outOfRange);
		}
	}

	private function convertResult(int $input): string | int
	{
		if ($this->is($input, $this->fizz * $this->buzz)) {
			return $this->stringFizz . $this->stringBuzz;
		}

		if ($this->is($input, $this->buzz)) {
			return $this->stringBuzz;
		}

		if ($this->is($input, $this->fizz)) {
			return $this->stringFizz;
		}

		return $input;
	}

	private function is(int $input, int $divisor): bool
	{
		return $input % $divisor === $this->modulo;
	}
}
