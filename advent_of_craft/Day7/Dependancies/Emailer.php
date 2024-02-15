<?php

declare(strict_types = 1);

namespace Advent\Day7\Dependancies;

interface Emailer
{
	public function send(string $message): void;
}
