<?php

declare(strict_types = 1);

use Katas\banking_kata\Account;

beforeEach(function (): void {
	$this->account = new Account;
});

test('deposit 500', function (): void {
	$this->account->deposit(500);
	expect($this->account->getBalance())->toBe(500);
});

test('deposit -500', function (): void {
	$this->account->deposit(-500);
	expect($this->account->getBalance())->toBe(500);
});

test('withdraw 100', function (): void {
	$this->account->withdraw(100);
	expect($this->account->getBalance())->toBe(-100);
});

test('withdraw -100', function (): void {
	$this->account->withdraw(-100);
	expect($this->account->getBalance())->toBe(-100);
});

test('Print statement of a deposit of 500', function (): void {
	$this->account->deposit(500);
	expect($this->account->printStatement())->toBe('Date Amount Balance\\n' . date('d.m.Y') . ' +500 500');
});

test('Print statement of a deposit of -500', function (): void {
	$this->account->deposit(-500);
	expect($this->account->printStatement())->toBe('Date Amount Balance\\n' . date('d.m.Y') . ' +500 500');
});
