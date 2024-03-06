<?php

declare(strict_types = 1);

use Advent\Day24\Instruction;
use Advent\Day24\Submarine;

it('Should move on given instructions', function (): void {
	$instructions = loadInstructions();
	$submarine = new Submarine(0, 0);

	$submarine->move($instructions);

	expect(calculateResult($submarine))->toBe(1690020);
});

function calculateResult(Submarine $submarine): int
{
	return $submarine->getPosition()->depth * $submarine->getPosition()->horizontal;
}

function loadInstructions(): array
{
	$lines = file(__DIR__ . '/ressources/submarine.txt', FILE_IGNORE_NEW_LINES);
	$instructions = [];

	foreach ($lines as $line) {
		$instructions[] = Instruction::fromText($line);
	}

	return $instructions;
}
