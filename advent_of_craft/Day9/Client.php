<?php

declare(strict_types = 1);

namespace Advent\Day9;

class Client
{
	private float $totalAmount = 0;

	private string $currencie = '€';

	public function __construct(private array $orderLines)
	{
	}

	public function toStatement(): string
	{
		$this->resetTotalAmount();

		$formatLinesArray = array_map([$this, 'callFormatLineOnArray'], $this->orderLines);

		$formatLines = implode(PHP_EOL, $formatLinesArray);

		return $formatLines . PHP_EOL . 'Total : ' . $this->totalAmount . $this->currencie;
	}

	public function getTotalAmount(): float
	{
		return $this->totalAmount;
	}

	private function callFormatLineOnArray(array $lines): string
	{
		return $this->formatLine($lines['key'], $lines['value']);
	}

	private function formatLine(string $name, float $value): string
	{
		$this->totalAmount += $value;

		return $name . ' for ' . number_format($value, 2) . $this->currencie;
	}

	private function resetTotalAmount(): void
	{
		$this->totalAmount = 0;
	}
}
