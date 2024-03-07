<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Greeter
{
	private ?GreeterInterface $formality = null;

	private string $hello = 'Hello.';

	public function greet(): string
	{
		if (null === $this->formality) {
			return $this->hello;
		}

		return $this->formality->greet();

	}

	public function setFormality(GreeterInterface $formality): void
	{
		$this->formality = $formality;
	}
}
