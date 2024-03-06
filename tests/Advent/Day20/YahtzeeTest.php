<?php

declare(strict_types = 1);

use Advent\Day20\YahtzeeCalculator;
use Tests\Advent\Day20\DiceBuilder;

describe('yahtzee calculate', function (): void {
	test('sum of dice for a specific number', function (array $dices, int $roll, int $result): void {
		expect(YahtzeeCalculator::number($dices, $roll))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(1, 2, 1, 1, 3)->build(), 1, 3],
		[DiceBuilder::newRoll(2, 3, 4, 5, 6)->build(), 1, 0],
		[DiceBuilder::newRoll(4, 4, 4, 4, 4)->build(), 1, 0],
		[DiceBuilder::newRoll(4, 1, 4, 4, 5)->build(), 4, 12],
	]);

	test('sum of dice for three of a kind', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::threeOfAKind($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(3, 3, 3, 4, 5)->build(), 18],
		[DiceBuilder::newRoll(2, 3, 4, 5, 6)->build(), 0],
		[DiceBuilder::newRoll(4, 4, 4, 4, 4)->build(), 20],
		[DiceBuilder::newRoll(1, 1, 2, 1, 5)->build(), 10],
	]);

	test('sum of dice for four of a kind', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::fourOfAKind($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(3, 3, 3, 3, 5)->build(), 17],
		[DiceBuilder::newRoll(2, 3, 4, 5, 6)->build(), 0],
		[DiceBuilder::newRoll(4, 4, 4, 4, 4)->build(), 20],
		[DiceBuilder::newRoll(1, 1, 1, 1, 5)->build(), 9],
	]);

	test('25 for full house', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::fullHouse($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(2, 2, 3, 3, 3)->build(), 25],
		[DiceBuilder::newRoll(2, 3, 4, 5, 6)->build(), 0],
		[DiceBuilder::newRoll(4, 4, 1, 4, 1)->build(), 25],
	]);

	test('30 for small straight', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::smallStraight($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(1, 2, 3, 4, 5)->build(), 30],
		[DiceBuilder::newRoll(5, 4, 3, 2, 1)->build(), 30],
		[DiceBuilder::newRoll(2, 3, 4, 5, 1)->build(), 30],
		[DiceBuilder::newRoll(1, 1, 1, 3, 2)->build(), 0],
	]);

	test('30 for large straight', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::largeStraight($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(1, 2, 3, 4, 5)->build(), 40],
		[DiceBuilder::newRoll(5, 4, 3, 2, 1)->build(), 40],
		[DiceBuilder::newRoll(2, 3, 4, 5, 6)->build(), 40],
		[DiceBuilder::newRoll(1, 4, 1, 3, 2)->build(), 0],
	]);

	test('50 for yahtzee', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::yahtzee($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(4, 4, 4, 4, 4)->build(), 50],
		[DiceBuilder::newRoll(2, 2, 2, 2, 2)->build(), 50],
		[DiceBuilder::newRoll(1, 4, 1, 3, 2)->build(), 0],
	]);

	test('sum of dice for chance', function (array $dices, int $result): void {
		expect(YahtzeeCalculator::chance($dices))->toBe($result);
	})->with([
		[DiceBuilder::newRoll(3, 3, 3, 3, 3)->build(), 15],
		[DiceBuilder::newRoll(6, 5, 4, 3, 3)->build(), 21],
		[DiceBuilder::newRoll(1, 4, 1, 3, 2)->build(), 11],
	]);

	describe('fail for', function (): void {
		test('invalid roll lengths for', function (array $dice): void {
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::number($dice, 1);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::threeOfAKind($dice);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::fourOfAKind($dice);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::fullHouse($dice);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::smallStraight($dice);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::largeStraight($dice);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::yahtzee($dice);
			});
			assertInvalidRollLength(function () use ($dice): void {
				YahtzeeCalculator::chance($dice);
			});
		})->with([
			[[1]],
			[[1, 1]],
			[[1, 6, 2]],
			[[1, 6, 2, 5]],
			[[1, 6, 2, 5, 4, 1]],
			[[1, 6, 2, 5, 4, 1, 2]],
		]);

		test('invalid dice in rolls for', function (array $dice): void {
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::number($dice, 1);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::threeOfAKind($dice);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::fourOfAKind($dice);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::fullHouse($dice);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::smallStraight($dice);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::largeStraight($dice);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::yahtzee($dice);
			});
			assertInvalidDiceInARoll(function () use ($dice): void {
				YahtzeeCalculator::chance($dice);
			});
		})->with([
			[[1, 1, 1, 1, 7]],
			[[0, 1, 1, 1, 2]],
			[[1, 1, -1, 1, 2]],
		]);
	});
});

function assertInvalidRollLength($calculate): void
{
	expect($calculate)->toThrow(new Error('Invalid dice... A roll should contain 5 dice.'));
}

function assertInvalidDiceInARoll($calculate): void
{
	expect($calculate)->toThrow(new Error('Invalid dice value. Each dice must be between 1 and 6.'));
}
