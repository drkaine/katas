<?php

declare(strict_types = 1);

namespace Advent\Day24;

class Submarine
{
	private Position $position;

	public function __construct(int $horizontal, int $depth)
	{
		$this->position = new Position($horizontal, $depth);
	}

	public function move(array $instructions): void
	{
		array_map([$this, 'applyInstruction'], $instructions);
	}

	public function getPosition(): Position
	{
		return $this->position;
	}

	private function applyInstruction(Instruction $instruction): void
	{
		switch ($instruction->text) {
			case 'down':
				$this->position->changeDepth($this->position->depth + $instruction->x);

				break;
			case 'up':
				$this->position->changeDepth($this->position->depth - $instruction->x);

				break;
			default:
				$this->position->moveHorizontally($this->position->horizontal + $instruction->x);
		}
	}
}
