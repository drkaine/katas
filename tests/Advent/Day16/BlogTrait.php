<?php

declare(strict_types = 1);

namespace Tests\Advent\Day16;

use Advent\Day16\Article;
use Advent\Day16\Comment;
use Faker\Factory;

trait BlogTrait
{
	public string $commentText = 'Amazing article !!!';

	public string $author = 'Pablo Escobar';

	public string $newComment;

	public string $newAuthor;

	public function generateNewComment(): void
	{
		$faker = Factory::create();

		$this->newAuthor = $faker->name();
		$this->newComment = $faker->word(2);
	}

	public function assertComment(Comment $comment, string $expectedText, string $expectedAuthor): void
	{
		expect($comment->text)->toBe($expectedText);
		expect($comment->author)->toBe($expectedAuthor);
	}

	public function given(ArticleBuilder $articleBuilder): Article
	{
		return $articleBuilder->build();
	}

	public function when(callable $act, Article $article): void
	{
		$act($article);
	}

	public function then(callable $act, Article $article): void
	{
		$act($article);
	}
}
