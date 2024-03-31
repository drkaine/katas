<?php

declare(strict_types = 1);

namespace Advent\Day14;

use Innmind\Immutable\Maybe;

class FizzBuzz
{
	private int $min = 0;

	private int $max = 100;

	private int $fizz = 3;

	private int $buzz = 5;

	private int $fizzBuzz = 15;

	public function fizzbuzz(int $input): Maybe
	{
		return match (true) {
			$this->isOutOfRange($input) => Maybe::nothing(),
			default => $this->convert($input),
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

	private function convert(int $input): Maybe
	{
		return match (true) {
			$this->is($this->fizzBuzz, $input) => Maybe::just('FizzBuzz'),
			$this->is($this->fizz, $input) => Maybe::just('Fizz'),
			$this->is($this->buzz, $input) => Maybe::just('Buzz'),
			default => Maybe::just($input),
		};
	}
}
