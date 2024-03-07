<?php

declare(strict_types = 1);

namespace Advent\Day23\exception;

use RuntimeException;
use Throwable;

class CollaboratorCallException extends RuntimeException
{
	public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}
