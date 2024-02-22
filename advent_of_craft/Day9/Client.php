<?php

declare(strict_types = 1);

namespace Advent\Day9;

class Client
{
	private $totalAmount;

	public function __construct(private array $orderLines)
	{
	}

	public function toStatement(): string
	{
		return implode(PHP_EOL, array_map(function ($entry) {
			return $this->formatLine($entry['key'], $entry['value']);
		}, $this->orderLines)) . PHP_EOL . 'Total : ' . $this->totalAmount . '€';
	}

	public function getTotalAmount(): int
	{
		return $this->totalAmount;
	}

	private function formatLine($name, $value): string
	{
		$this->totalAmount += $value;

		return $name . ' for ' . $value . '€';
	}
}
