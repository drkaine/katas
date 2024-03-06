<?php

declare(strict_types = 1);

namespace Advent\Day24;

class Instruction
{
	public function __construct(
		public string $text,
		public int $x
	) {
	}

	public static function fromText(string $text): Instruction
	{
		$split = explode(' ', $text);

		return new Instruction($split[0], (int) $split[1]);
	}
}
