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

	public function roll(int $number_of_pins): void
	{
		$this->score += $number_of_pins;
	}
}
