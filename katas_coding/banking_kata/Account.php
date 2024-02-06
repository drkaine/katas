<?php

declare(strict_types = 1);

namespace Katas\banking_kata;

class Account
{
	private int $balance = 0;

	public function deposit(int $amount): void
	{
		if (0 < $amount) {
			$this->balance += $amount;
		}
	}

	public function withdraw(int $amount): void
	{
		if (0 < $amount) {
			$this->balance -= $amount;
		} else {
			$this->balance += $amount;
		}
	}

	public function getBalance(): int
	{
		return $this->balance;
	}
}
