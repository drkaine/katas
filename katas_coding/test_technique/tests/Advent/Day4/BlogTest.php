<?php

declare(strict_types = 1);

use Advent\Day4\Article;
use Carbon\Carbon;

beforeEach(function (): void {
	$this->text = 'Amazing article !!!';
	$this->author = 'Pablo Escobar';
	$this->date = new Carbon;
	$this->format = 'y-m-d';

	$this->firstComment = 0;

	$this->article = new Article(
		'Lorem Ipsum',
		'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore'
	);

	$this->article->addComment($this->text, $this->author);
});

describe('A comment', function (): void {
	test('should have the text gived on this creation', function (): void {
		$comments = $this->article->getComments()[$this->firstComment]->text;
		expect($comments)->toBe($this->text);
	});

	test('should have the author gived on this creation', function (): void {
		$author = $this->article->getComments()[$this->firstComment]->author;
		expect($author)->toBe($this->author);
	});

	test('should have the date of the day of his creation', function (): void {
		$firstCommentCreationDate = $this->article->getComments()[$this->firstComment]->creationDate;

		expect($firstCommentCreationDate->format($this->format))->toBe($this->date->format($this->format));
	});
});

describe('Article in a blog', function (): void {
	test('should have add comment', function (): void {
		expect(count($this->article->getComments()))->toBe(1);
	});

	test('should throw an error when adding existing comment', function (): void {
		expect(function (): void {
			$this->article->addComment($this->text, $this->author);
		})->toThrow('Comment already exists');
	});
});
