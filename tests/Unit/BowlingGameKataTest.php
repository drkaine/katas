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
