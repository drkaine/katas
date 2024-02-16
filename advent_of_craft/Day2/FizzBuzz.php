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
		if ($this->min >= $input || $this->max < $input) {
			throw new Exception($this->outOfRange);
		}

		return $this->isFizz($input) . $this->isBuzz($input) ?: $input;
	}

	private function isFizz($input): string | false
	{
		if ($input % $this->fizz === $this->modulo) {
			return $this->stringFizz;
		}

		return false;
	}

	private function isBuzz($input): string | false
	{
		if ($input % $this->buzz === $this->modulo) {
			return $this->stringBuzz;
		}

		return false;
	}
}
