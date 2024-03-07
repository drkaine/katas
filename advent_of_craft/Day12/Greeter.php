<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Greeter
{
	private ?string $formality = null;

	private string $hello = 'Hello.';

	private string $goodEveningSir = 'Good evening, sir.';

	private string $supBro = 'Sup bro?';

	private string $helloDarling = 'Hello Darling!';

	private string $formalCondition = 'formal';

	private string $casualCondition = 'casual';

	private string $intimateCondition = 'intimate';

	public function greet(): string
	{
		if (null === $this->formality) {
			return $this->hello;
		}

		if ($this->formalCondition === $this->formality) {
			return $this->goodEveningSir;
		} elseif ($this->casualCondition === $this->formality) {
			return $this->supBro;
		} elseif ($this->intimateCondition === $this->formality) {
			return $this->helloDarling;
		}

		return $this->hello;

	}

	public function setFormality(string $formality): void
	{
		$this->formality = $formality;
	}
}
