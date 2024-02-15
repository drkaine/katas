<?php

declare(strict_types = 1);

namespace Advent\Day9;

class Client
{
	private float $totalAmount = 0;

	public function __construct(
		private readonly array $orderLines
	) {
	}

	public function toStatement(): string
	{
		$lines = array_map(function ($name, $value) {
			return $this->formatLine($name, $value);
		}, array_keys($this->orderLines), $this->orderLines);

		return implode("\n", $lines) . "\nTotal : " . number_format($this->totalAmount, 2) . '€';
	}

	public function getTotalAmount(): float
	{
		return $this->totalAmount;
	}

	private function formatLine(string $name, float $value): string
	{
		$this->totalAmount += $value;

		return $name . ' for ' . number_format($value, 2) . '€';
	}
}
