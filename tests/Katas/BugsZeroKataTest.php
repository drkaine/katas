<?php

declare(strict_types = 1);

use Katas\bugs_zero_kata\GameRunner;

test('lock downr', function (): void {
	srand(123455);
	ob_start();

	GameRunner::runGame();

	$actual = ob_get_contents();
	ob_end_clean();

	$expected = file_get_contents('./tests/Katas/datas_tests/approved.txt');

	expect($actual)->toBe($expected);
});
