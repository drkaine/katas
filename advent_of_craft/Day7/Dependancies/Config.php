<?php

declare(strict_types = 1);

namespace Advent\Day7\Dependancies;

interface Config
{
	public function sendEmailSummary(): bool;
}
