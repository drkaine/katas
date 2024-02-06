<?php

declare(strict_types = 1);

namespace Katas\bowling_game_kata;

class Game
{
	private array $frames = [];

	public function score(): int
	{
		$score = 0;
		$bonus = false;
		$strike = false;
		$number_of_frames = count($this->frames);

		for ($i = 0; $number_of_frames > $i; $i = $i + 2) {
			if ($bonus) {
				$score += $this->frames[$i];
				$bonus = false;
			}

			$score += $this->frames[$i];

			if (10 === $this->frames[$i]) {
				$strike = true;

				continue;
			}

			if ($i + 1 < $number_of_frames) {

				if ($strike) {
					$score += $this->frames[$i + 1] + $this->frames[$i];
					$strike = false;
				}

				$score += $this->frames[$i + 1];

				$bonus = $this->haveBonus($this->frames[$i + 1] + $this->frames[$i]);
			}
		}

		return $score;
	}

	public function roll(int $number_of_pins): void
	{
		$this->frames[] = $number_of_pins;

		if (10 === $number_of_pins) {
			$this->roll(0);
		}
	}

	private function haveBonus(int $score): bool
	{
		return (bool) (10 === $score);
	}
}
