<?php

declare(strict_types = 1);

namespace Tests\Advent\Day19;

use Advent\Day19\Article;

class ArticleBuilder
{
	private array $comments = [];

	private string $author = 'Pablo Escobar';

	private string $commentText = 'Amazing article !!!';

	public static function anArticle(): ArticleBuilder
	{
		return new ArticleBuilder;
	}

	public function commented(): ArticleBuilder
	{
		$this->comments[$this->commentText] = $this->author;

		return $this;
	}

	public function build(): Article
	{
		$article = new Article(
			'Lorem Ipsum',
			'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore'
		);

		foreach ($this->comments as $key => $value) {
			$article->addComment($key, $value);
		}

		return $article;
	}
}
