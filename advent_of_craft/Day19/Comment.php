<?php

declare(strict_types = 1);

namespace App;

use Carbon\Carbon;

class Comment
{
	public function __construct(
		public string $text,
		public string $author,
		public Carbon $creationDate,
	) {
	}

	public function isSame(Comment $otherComment): bool
	{
		return $this->text === $otherComment->text &&
			$this->author === $otherComment->author &&
			$this->creationDate->format('Y-m-d') === $otherComment->creationDate->format('Y-m-d');
	}
}
