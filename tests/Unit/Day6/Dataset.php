<?php

declare(strict_types = 1);

return [
	'validData' => [
		[1, 1],
		[67, 67],
		[82, 82],
		[3, 'Fizz'],
		[66, 'Fizz'],
		[99, 'Fizz'],
		[5, 'Buzz'],
		[55, 'Buzz'],
		[95, 'Buzz'],
		[15, 'FizzBuzz'],
		[30, 'FizzBuzz'],
		[45, 'FizzBuzz'],
	],
	'invalidData' => [
		[101, 'Input is out of range'],
		[0, 'Input is out of range'],
		[-1, 'Input is out of range'],
	],
];
