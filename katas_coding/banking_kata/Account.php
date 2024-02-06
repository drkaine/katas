<?php

declare(strict_types = 1);

namespace Katas\banking_kata;

class Account
{
	private int $balance = 0;

	private array $movements;

	public function deposit(int $amount): void
	{
		$this->balance += abs($amount);

		$this->movements[] = [
			'Date' => date('d.m.Y'),
			'Amount' => '+' . abs($amount),
			'Balance' => $this->balance,
		];
	}

	public function withdraw(int $amount): void
	{
		$this->balance -= abs($amount);

		$this->movements[] = [
			'Date' => date('d.m.Y'),
			'Amount' => '-' . abs($amount),
			'Balance' => $this->balance,
		];
	}

	public function printStatement(): string
	{
		$statement = 'Date Amount Balance';

		foreach ($this->movements as $movement) {
			$statement .= '\\n' . $movement['Date'] . ' ' . $movement['Amount'] . ' ' . $movement['Balance'];
		}

		return $statement;
	}
}
