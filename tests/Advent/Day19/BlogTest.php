<?php

declare(strict_types = 1);

uses(Tests\Advent\Day19\BlogTrait::class);

use Advent\Day19\CommentAlreadyExistException;
use Tests\Advent\Day19\ArticleBuilder;

describe('Article in a blog', function (): void {

	test('should add comment in an article', function (): void {
		$article = $this->given(ArticleBuilder::anArticle());
		$this->when(function ($article): void {
			$article->addComment($this->commentText, $this->author);
		}, $article);
		$this->then(function ($article): void {
			expect(count($article->getComments()))->
				toBe(1);
			$this->assertComment(
				$article->getComments()[0],
				$this->commentText,
				$this->author
			);
		}, $article);
	});

	test('should add comment in an article containing already one', function (): void {
		$this->generateNewComment();

		$article = $this->given(ArticleBuilder::anArticle()->commented());
		$this->when(function ($article): void {
			$article->addComment($this->newComment, $this->newAuthor);
		}, $article);
		$this->then(function ($article): void {
			expect(count($article->getComments()))->
				toBe(2);
			$this->assertComment(
				$article->getComments()[0],
				$this->commentText,
				$this->author
			);
		}, $article);
	});

	test('should fail when adding existing comment', function (): void {
		expect(function (): void {
			$article = $this->given(ArticleBuilder::anArticle()->commented());
			$article->addComment($this->commentText, $this->author);
		})->toThrow(CommentAlreadyExistException::class, 'Comment already exists');
	});
});
