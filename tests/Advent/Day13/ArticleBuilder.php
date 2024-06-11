<?php

declare(strict_types = 1);

namespace Tests\Advent\Day13;

use Advent\Day13\Article;
use Advent\Day13\Comment;

class ArticleBuilder
{
	private Article $article;

	private string $commentText = 'Amazing article !!!';

	private string $author = 'Pablo Escobar';

	private string $otherCommentText = 'Finibus Bonorum et Malorum';

	private string $otherAuthor = 'Al Capone';

	private string $name = 'Lorem Ipsum';

	private string $content = 'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore';

	public function __construct()
	{
		$this->article = new Article(
			$this->name,
			$this->content
		);

		$this->addComment();

		return $this->article;
	}

	public function addComment(): void
	{
		$this->article->addComment($this->commentText, $this->author);
	}

	public function getCommentText(int $commentNumber): string
	{
		return $this->getOneComment($commentNumber)->text;
	}

	public function getCommentAuthor(int $commentNumber): string
	{
		return $this->getOneComment($commentNumber)->author;
	}

	public function addAnOtherComment(): void
	{
		$this->article->addComment($this->otherCommentText, $this->otherAuthor);
	}

	public function countOfComments(): int
	{
		return count($this->article->getComments());
	}

	private function getOneComment(int $commentNumber): Comment
	{
		return $this->article->getComments()[$commentNumber];
	}
}
