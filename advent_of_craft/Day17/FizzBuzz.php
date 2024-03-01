<?php

declare(strict_types = 1);

namespace Advent\Day17;

class FizzBuzz
{
	private int $min = 0;

	private int $max = 100;

	private array $mapping = [
		3 => 'Fizz',
		5 => 'Buzz',
		15 => 'FizzBuzz',
	];

	public function fizzbuzz(int $input): int | string | null
	{
		return $this->isOutOfRange($input) ? null : $this->convertSafely($input);
	}

	private function convertSafely(int $input): string | int
	{
		$result = array_reduce(array_keys($this->mapping), function ($carry, $divisor) use ($input) {
			return $this->is($divisor, $input) ? $this->mapping[$divisor] : $carry;
		}, '');

		return ('' === $result) ? $input : $result;
	}

	private function is(int $divisor, int $input): bool
	{
		return $input % $divisor === 0;
	}

	private function isOutOfRange(int $input): bool
	{
		return $input <= $this->min || $input > $this->max;
	}
}
