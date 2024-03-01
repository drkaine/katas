<?php

declare(strict_types = 1);

namespace App;

use Carbon\Carbon;

class Article
{
	private array $comments = [];

	public function __construct(
		private string $name,
		private string $content,
	) {

	}

	public function getComments(): array
	{
		return $this->comments;
	}

	public function addComment(string $text, string $author): void
	{
		$this->addCommentWithCreationDate($text, $author, new Carbon);
	}

	private function addCommentWithCreationDate(
		string $text,
		string $author,
		Carbon $creationDate,
	): void {
		$otherComment = new Comment($text, $author, $creationDate);

		foreach ($this->comments as $comment) {
			if ($comment->isSame($otherComment)) {
				throw new CommentAlreadyExistException('Comment already exists');
			}
		}

		$this->comments[] = $otherComment;

	}
}
