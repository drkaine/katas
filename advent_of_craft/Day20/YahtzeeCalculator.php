<?php

declare(strict_types = 1);

namespace Advent\Day20;

use Error;

class YahtzeeCalculator
{
	private const ROLL_LENGTH = 5;

	private const MINIMUM_DICE = 1;

	private const MAXIMUM_DICE = 6;

	public static function number(array $dice, int $number): int
	{
		return self::calculate(
			function ($d) use ($number) {
				return array_reduce($d, function ($sum, $dice) use ($number) {
					return $sum + ($dice === $number ? $dice : 0);
				}, 0);
			},
			$dice
		);
	}

	public static function threeOfAKind(array $dice): int
	{
		return self::calculateNOfAKind($dice, 3);
	}

	public static function fourOfAKind(array $dice): int
	{
		return self::calculateNOfAKind($dice, 4);
	}

	public static function yahtzee(array $dice): int
	{
		return self::calculate(
			function ($d) {
				return (count(array_unique($d)) === 1) ? Scores::YAHTZEE_SCORE : 0;
			},
			$dice
		);
	}

	public static function fullHouse(array $dice): int
	{
		return self::calculate(
			function ($d) {
				$frequencies = array_count_values($d);
				$hasThreeOfAKind = in_array(3, $frequencies);
				$hasPair = in_array(2, $frequencies);

				return ($hasThreeOfAKind && $hasPair) ? Scores::HOUSE_SCORE : 0;
			},
			$dice
		);
	}

	public static function smallStraight(array $dice): int
	{
		return self::calculate(
			function ($d) {
				sort($d);
				$diceString = implode('', array_unique($d));

				return self::isSmallStraight($diceString) ? 30 : 0;
			},
			$dice
		);
	}

	public static function largeStraight(array $dice): int
	{
		return self::calculate(
			function ($d) {
				sort($d);
				$isSequential = true;
				for ($i = 1; count($d) > $i; $i++) {
					if ($d[$i - 1] + 1 !== $d[$i]) {
						$isSequential = false;

						break;
					}
				}

				return $isSequential ? Scores::LARGE_STRAIGHT_SCORE : 0;
			},
			$dice
		);
	}

	public static function chance(array $dice): int
	{
		return self::calculate(
			function ($d) {
				return array_sum($d);
			},
			$dice
		);
	}

	private static function calculateNOfAKind(array $dice, int $n): int
	{
		return self::calculate(
			function ($d) use ($n) {
				$frequencies = array_count_values($d);
				$hasNOfAKind = self::hasNOfAKind($frequencies, $n);

				return $hasNOfAKind ? array_sum($d) : 0;
			},
			$dice
		);
	}

	private static function hasNOfAKind(array $diceFrequency, int $n)
	{
		foreach ($diceFrequency as $count) {
			if ($count >= $n) {
				return true;
			}
		}

		return false;
	}

	private static function validateRoll(array $dice): void
	{
		if (count($dice) !== self::ROLL_LENGTH) {
			throw new Error('Invalid dice... A roll should contain 5 dice.');
		}

		if (array_filter($dice, function ($dice) {
			return self::MINIMUM_DICE > $dice || self::MAXIMUM_DICE < $dice;
		})) {
			throw new Error('Invalid dice value. Each dice must be between 1 and 6.');
		}
	}

	private static function isSmallStraight(string $diceString): bool
	{
		return str_contains($diceString, '1234') || str_contains($diceString, '2345') || str_contains($diceString, '3456');
	}

	private static function calculate(callable $compute, array $dice): int
	{
		self::validateRoll($dice);

		return $compute($dice);
	}
}

class Scores
{
	public const YAHTZEE_SCORE = 50;

	public const HOUSE_SCORE = 25;

	public const LARGE_STRAIGHT_SCORE = 40;
}
