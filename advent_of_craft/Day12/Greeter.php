<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Greeter
{
	private ?string $formality = null;

	public function greet(): string
	{
		if (null === $this->formality) {
			return 'Hello.';
		}

		if ('formal' === $this->formality) {
			return 'Good evening, sir.';
		} elseif ('casual' === $this->formality) {
			return 'Sup bro?';
		} elseif ('intimate' === $this->formality) {
			return 'Hello Darling!';
		}

		return 'Hello.';

	}

	public function setFormality(string $formality): void
	{
		$this->formality = $formality;
	}
}
