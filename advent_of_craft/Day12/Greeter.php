<?php

declare(strict_types = 1);

namespace Advent\Day12;

class Greeter
{
	private GreeterInterface $formality;

	public function __construct()
	{
		$this->formality = new Hello;
	}

	public function greet(): string
	{
		return $this->formality->greet();
	}

	public function setFormality(GreeterInterface $formality): void
	{
		$this->formality = $formality;
	}
}
