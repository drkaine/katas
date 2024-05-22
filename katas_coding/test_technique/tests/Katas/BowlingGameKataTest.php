<?php

declare(strict_types = 1);

use Katas\bowling_game_kata\Game;

beforeEach(function (): void {
	$this->game = new Game;
});

test('score without roll', function (): void {
	expect($this->game->score())->toBe(0);
});

test('score with one pins', function (): void {
	$this->game->roll(1);
	expect($this->game->score())->toBe(1);
});

test('score with a spare and 9 pins on the third frames', function (): void {
	$this->game->roll(1);
	$this->game->roll(9);
	$this->game->roll(9);
	expect($this->game->score())->toBe(28);
});

test('score with a strike and 9 pins on the third  and fourth frames', function (): void {
	$this->game->roll(10);
	$this->game->roll(8);
	$this->game->roll(1);
	expect($this->game->score())->toBe(28);
});

test('score limit at 10 frames', function (): void {
	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);

	expect($this->game->score())->toBe(20);
});

test('score with 2 last roll are strike and have roll 1 extra time', function (): void {
	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(10);
	$this->game->roll(10);

	$this->game->roll(10);

	expect($this->game->score())->toBe(49);
});

test('score with in the last frame the roll is spare and have roll 1 extra roll', function (): void {
	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(9);
	$this->game->roll(1);

	$this->game->roll(10);

	expect($this->game->score())->toBe(30);
});

test('Test the rule that a spare is on the same frame', function (): void {
	$this->game->roll(1);
	$this->game->roll(2);

	$this->game->roll(8);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	expect($this->game->score())->toBe(28);
});

test('Test the rule that a strike is on the first roll', function (): void {
	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(0);
	$this->game->roll(10);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	$this->game->roll(1);
	$this->game->roll(1);

	expect($this->game->score())->toBe(29);
});
