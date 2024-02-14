<?php

declare(strict_types = 1);

namespace Advent\Day3;

class Person
{
	public function __construct(
		public readonly string $firstName,
		public readonly string $lastName,
		public readonly array $pets
	) {
	}
}
