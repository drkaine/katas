<?php

declare(strict_types = 1);

namespace Advent\Day7\Dependancies;

interface Logger
{
	public function info(string $message): void;

	public function error(string $message): void;
}
