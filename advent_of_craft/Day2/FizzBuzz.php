<?php

declare(strict_types = 1);

namespace Advent\Day2;

use Exception;

class FizzBuzz
{
	public function fizzBuzz(int $input): string | int
	{
		if (0 < $input) {
			if (100 >= $input) {
				if ($input % 3 === 0 && $input % 5 === 0) {
					return 'FizzBuzz';
				}
				if ($input % 3 === 0) {
					return 'Fizz';
				}
				if ($input % 5 === 0) {
					return 'Buzz';
				}

				return $input;
			}

			throw new Exception('Input is out of range');

		} else {
			throw new Exception('Input is out of range');
		}
	}
}
