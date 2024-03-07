<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Casual implements GreeterInterface
{
	public function greet(): string
	{
		return 'Sup bro?';
	}
}
