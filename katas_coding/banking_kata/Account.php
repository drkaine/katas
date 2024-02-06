<?php

declare(strict_types = 1);

namespace Katas\banking_kata;

class Account
{
	private int $balance;

	public function deposit(int $amount): void
	{
		$this->balance = $amount;
	}

	public function getBalance(): int
	{
		return $this->balance;
	}
}
