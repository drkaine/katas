<?php

declare(strict_types = 1);

namespace Katas\banking_kata;

class Account
{
	private int $balance = 0;

	private array $movements;

	public function deposit(int $amount): void
	{
		if (0 < $amount) {
			$this->balance += $amount;
		} else {
			$this->balance -= $amount;
		}

		$this->movements[] = [
			'Date' => date('d.m.Y'),
			'Amount' => '+' . $amount,
			'Balance' => $this->balance,
		];
	}

	public function withdraw(int $amount): void
	{
		if (0 < $amount) {
			$this->balance -= $amount;
		} else {
			$this->balance += $amount;
		}
	}

	public function printStatement(): string
	{
		$statement = 'Date Amount Balance';

		foreach ($this->movements as $movement) {
			$statement .= '\\n' . $movement['Date'] . ' ' . $movement['Amount'] . ' ' . $movement['Balance'];
		}

		return $statement;
	}

	public function getBalance(): int
	{
		return $this->balance;
	}
}
