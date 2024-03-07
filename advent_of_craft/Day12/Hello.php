<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Hello implements GreeterInterface
{
	public function greet(): string
	{
		return 'Hello.';
	}
}
