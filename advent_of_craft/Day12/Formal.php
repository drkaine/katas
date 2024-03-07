<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Formal implements GreeterInterface
{
	public function greet(): string
	{
		return 'Good evening, sir.';
	}
}
