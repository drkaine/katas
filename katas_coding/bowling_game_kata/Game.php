<?php

declare(strict_types = 1);

namespace Katas\bowling_game_kata;

class Game
{
	private array $frames = [];

	public function score(): int
	{
		$score = 0;
		$bonus = true;

		for ($i = 0; count($this->frames) > $i; $i = $i + 2) {
			$score += $this->frames[$i];

			if ($i + 1 < count($this->frames)) {
				$score += $this->frames[$i + 1];

				if ($this->frames[$i + 1] + $this->frames[$i] === 10) {
					$bonus = true;
				}
			}

			if ($bonus && $i + 2 < count($this->frames)) {
				$score += $this->frames[$i + 2];
			}
		}

		return $score;
	}

	public function roll(int $number_of_pins): void
	{
		$this->frames[] = $number_of_pins;
	}
}
