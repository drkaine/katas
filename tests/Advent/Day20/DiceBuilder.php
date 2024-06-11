<?php

declare(strict_types = 1);

namespace Tests\Advent\Day20;

class DiceBuilder
{
	private $dice;

	public function __construct(array $dice)
	{
		$this->dice = $dice;
	}

	public function __toString(): string
	{
		return implode(',', $this->dice);
	}

	public static function newRoll(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): self
	{
		return new self([$dice1, $dice2, $dice3, $dice4, $dice5]);
	}

	public function build(): array
	{
		return $this->dice;
	}
}
