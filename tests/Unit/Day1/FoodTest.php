<?php

declare(strict_types = 1);

use Advent\Day1\Food;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

beforeEach(function (): void {
	$this->expirationDate = Carbon::createFromDate(2023, 12, 1);
	$this->inspector = Uuid::uuid4();
	$this->notFreshDate = $this->expirationDate->copy()->addDays(7);
	$this->freshDate = $this->expirationDate->copy()->subDays(7);
});

dataset('notEdibleFoodDataProvider', function () {
	return [
		[true, Uuid::uuid4(), Carbon::createFromDate(2023, 12, 1)->copy()->addDays(7)],
		[false, Uuid::uuid4(), Carbon::createFromDate(2023, 12, 1)->copy()->subDays(7)],
		[true, null, Carbon::createFromDate(2023, 12, 1)->copy()->subDays(7)],
		[false, null, Carbon::createFromDate(2023, 12, 1)->copy()->addDays(7)],
		[false, null, Carbon::createFromDate(2023, 12, 1)->copy()->subDays(7)],
	];
});

test('not edible if not fresh', function (bool $approvedForConsumption, $inspectorId, Carbon $now): void {
	$food = new Food(
		approvedForConsumption: $approvedForConsumption,
		inspectorId: $inspectorId,
		expirationDate: $this->expirationDate
	);

	expect($food->isEdible($now))->toBeFalse();
})->with('notEdibleFoodDataProvider');

test('edible food', function (): void {
	$food = new Food(
		approvedForConsumption: true,
		inspectorId: $this->inspector,
		expirationDate: $this->expirationDate
	);

	expect($food->isEdible($this->freshDate))->toBeTrue();
});
