<?php

declare(strict_types = 1);

namespace Katas\bowling_game_kata;

class Game
{
	private array $frames = [];

	private int $score = 0;

	private int $strike = 0;

	private bool $spare = false;

	private bool $first_roll = true;

	public function score(): int
	{
		return $this->score;
	}

	public function roll(int $number_of_pins): void
	{
		if ($this->haveRoll()) {
			$this->addInScore($number_of_pins);

			$this->haveBonus($number_of_pins);

			$this->frames[] = $number_of_pins;

			$this->isFirstRoll();
		}
	}

	private function addInScore(int $number_of_pins): void
	{
		$this->addBonus($number_of_pins);

		$this->score += $number_of_pins;
	}

	private function addBonus(int $number_of_pins): void
	{
		if ($this->spare) {
			$this->score += $number_of_pins;
			$this->spare = false;
		}

		if (0 < $this->strike) {
			$this->score += $number_of_pins;
			$this->strike --;
		}
	}

	private function haveBonus(int $number_of_pins): void
	{
		$last_frame = count($this->frames) !== 0 ? $this->frames[count($this->frames) - 1] : -1;

		if ($this->giveBonus($number_of_pins)) {
			$this->frames[] = 0;
			$this->strike = 2;
		}

		if ($this->giveBonus($number_of_pins + $last_frame) && ! $this->first_roll) {
			$this->spare = true;
		}
	}

	private function haveRoll(): bool
	{
		if ($this->strike && count($this->frames) < 22) {
			return true;
		} elseif ($this->spare && count($this->frames) < 21) {
			return true;
		}

		return (bool) (count($this->frames) < 20);
	}

	private function isFirstRoll(): void
	{
		$this->first_roll = ! $this->first_roll;
	}

	private function giveBonus(int $number_of_pins): bool
	{
		return (bool) (10 === $number_of_pins);
	}
}
