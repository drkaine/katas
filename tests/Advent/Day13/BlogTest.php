<?php

declare(strict_types = 1);

use Advent\Day13\Article;
use Advent\Day13\CommentAlreadyExistException;

describe('Article in a blog', function (): void {
	beforeEach(function (): void {
		$this->article = new Article(
			'Lorem Ipsum',
			'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore'
		);

		$this->commentText = 'Amazing article !!!';

		$this->author = 'Pablo Escobar';
	});

	test('should add comment in an article', function (): void {
		$this->article->addComment($this->commentText, $this->author);

		expect($this->article->getComments())->toHaveLength(1);

		$comment = $this->article->getComments()[0];

		expect($comment->text)->toBe($this->commentText);
		expect($comment->author)->toBe($this->author);
	});

	test('should add comment in an article containing already one', function (): void {
		$newComment = 'Finibus Bonorum et Malorum';
		$newAuthor = 'Al Capone';

		$this->article->addComment($this->commentText, $this->author);
		$this->article->addComment($newComment, $newAuthor);

		$lastComment = $this->article->getComments()[1];

		expect($lastComment->text)->toBe($newComment);
		expect($lastComment->author)->toBe($newAuthor);
	});

	test('should fail when adding existing comment', function (): void {
		$this->article->addComment($this->commentText, $this->author);

		expect(function (): void {
			$this->article->addComment($this->commentText, $this->author);
		})->toThrow(CommentAlreadyExistException::class, 'Comment already exists');
	});

});
