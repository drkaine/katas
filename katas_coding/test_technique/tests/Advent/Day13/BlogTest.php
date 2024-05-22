<?php

declare(strict_types = 1);

use Advent\Day13\CommentAlreadyExistException;
use Tests\Advent\Day13\ArticleBuilder;

describe('Article in a blog', function (): void {
	beforeEach(function (): void {
		$this->commentText = 'Amazing article !!!';

		$this->author = 'Pablo Escobar';
		$this->articleBuilder = new ArticleBuilder;
	});

	test('should add comment in an article', function (): void {
		expect($this->articleBuilder->countOfComments())->toBe(1);

		expect($this->articleBuilder->getCommentText(0))->toBe($this->commentText);
		expect($this->articleBuilder->getCommentAuthor(0))->toBe($this->author);
	});

	test('should contain more than one comment', function (): void {
		$this->articleBuilder->addAnOtherComment();

		expect($this->articleBuilder->countOfComments())->toBe(2);
	});

	test('should fail when adding existing comment', function (): void {
		expect(function (): void {
			$this->articleBuilder->addComment();
		})->toThrow(CommentAlreadyExistException::class, 'Comment already exists');
	});

});
