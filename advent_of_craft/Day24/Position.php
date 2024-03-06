<?php

declare(strict_types = 1);

namespace Advent\Day24;

class Position
{
	public function __construct(
		public int $horizontal,
		public int $depth
	) {
	}

	public function changeDepth(int $newDepth): void
	{
		$this->depth = $newDepth;
	}

	public function moveHorizontally(int $newHorizontal): void
	{
		$this->horizontal = $newHorizontal;
	}
}
