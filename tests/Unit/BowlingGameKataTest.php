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
