<?php

declare(strict_types = 1);

namespace Advent\Day11;

class RomanNumerals
{
	private array $intToNumerals = [
		1000 => 'M',
		900 => 'CM',
		500 => 'D',
		400 => 'CD',
		100 => 'C',
		90 => 'XC',
		50 => 'L',
		40 => 'XL',
		10 => 'X',
		9 => 'IX',
		5 => 'V',
		4 => 'IV',
		1 => 'I',
	];

	private int $maxNumber = 3999;

	public function convert(int $number): ?string
	{
		if (!$this->isInRange($number)) {
			return null;
		}

		$roman = '';
		$remaining = $number;

		foreach ($this->intToNumerals as $value => $numeral) {
			while ($remaining >= $value) {
				$roman .= $numeral;
				$remaining -= $value;
			}
		}

		return '' !== $roman ? $roman : null;
	}

	private function isInRange(int $number): bool
	{
		return 0 < $number && $number <= $this->maxNumber;
	}
}
