<?php

declare(strict_types = 1);

namespace Advent\Day8;

class Password
{
	private int $minimumLenght = 8;

	private string $regexLowercaseLetter = '/[a-z]/';

	private string $regexCapitalLetter = '/[A-Z]/';

	private string $regexNumber = '/[0-9]/';

	private string $regexSpecialCharacter = '/[.*#@\$%&]/';

	public function isValid(string $password): bool
	{
		if ($this->haveTheRequireLenght($password)) {
			return false;
		}

		if ($this->haveLowercaseLetter($password)) {
			return false;
		}

		if ($this->haveCapitalLetter($password)) {
			return false;
		}

		if ($this->haveNumber($password)) {
			return false;
		}

		if ($this->haveSpecialCharacter($password)) {
			return false;
		}

		return ! ($this->verifyNonAuthorizedCharacter($password));
	}

	private function haveTheRequireLenght(string $password): bool
	{
		return strlen($password) < $this->minimumLenght;
	}

	private function haveLowercaseLetter(string $password): bool
	{
		return preg_match($this->regexLowercaseLetter, $password) !== 1;
	}

	private function haveCapitalLetter(string $password): bool
	{
		return preg_match($this->regexCapitalLetter, $password) !== 1;
	}

	private function haveNumber(string $password): bool
	{
		return preg_match($this->regexNumber, $password) !== 1;
	}

	private function haveSpecialCharacter(string $password): bool
	{
		return preg_match($this->regexSpecialCharacter, $password) !== 1;
	}

	private function verifyNonAuthorizedCharacter(string $password): bool
	{
		$passwordTest = preg_replace($this->regexLowercaseLetter, '', $password);

		$passwordTest = preg_replace($this->regexCapitalLetter, '', $passwordTest);

		$passwordTest = preg_replace($this->regexNumber, '', $passwordTest);

		$passwordTest = preg_replace($this->regexSpecialCharacter, '', $passwordTest);

		return '' !== $passwordTest;
	}
}
