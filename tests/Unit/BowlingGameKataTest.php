<?php

declare(strict_types = 1);

use Katas\bowling_game_kata\Game;

beforeEach(function (): void {
	$this->game = new Game;
});

test('score without roll', function (): void {
	expect($this->game->score())->toBe(0);
});
