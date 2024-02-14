<?php

declare(strict_types = 1);

namespace Advent\Day4;

use DateTime;

class Comment
{
	public function __construct(
		public readonly string $text,
		public readonly string $author,
		public readonly DateTime $creationDate
	) {
	}

	public function isSame(Comment $otherComment): bool
	{
		return $this->text === $otherComment->text &&
			$this->author === $otherComment->author &&
			$this->creationDate->format('Y-m-d') === $otherComment->creationDate->format('Y-m-d');
	}
}
