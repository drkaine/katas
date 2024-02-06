<?php

declare(strict_types = 1);

namespace Katas\bowling_game_kata;

class Game
{
	private int $score = 0;

	public function score(): int
	{
		return $this->score;
	}
}
