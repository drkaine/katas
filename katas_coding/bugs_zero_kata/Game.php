<?php

declare(strict_types = 1);

namespace Katas\bugs_zero_kata;

function echoln($string): void
{
	print $string . "\n";
}

class Game
{
	public array $players = [];

	public array $places = [0];

	public array $purses = [0];

	public array $inPenaltyBox = [0];

	public array $popQuestions = [];

	public array $scienceQuestions = [];

	public array $sportsQuestions = [];

	public array $rockQuestions = [];

	public int $currentPlayer = 0;

	public bool $isGettingOutOfPenaltyBox;

	public function __construct()
	{
		$this->createQuestions();
	}

	public function isPlayable()
	{
		return $this->howManyPlayers() >= 2;
	}

	public function add(string $playerName): true
	{
		$this->players[] = $playerName;
		$this->places[$this->howManyPlayers()] = 0;
		$this->purses[$this->howManyPlayers()] = 0;
		$this->inPenaltyBox[$this->howManyPlayers()] = false;

		echoln($playerName . ' was added');
		echoln('They are player number ' . count($this->players));

		return true;
	}

	public function howManyPlayers(): int
	{
		return count($this->players);
	}

	public function roll(int $roll): void
	{
		echoln($this->players[$this->currentPlayer] . ' is the current player');
		echoln('They have rolled a ' . $roll);

		if ($this->inPenaltyBox[$this->currentPlayer]) {
			if ($roll % 2 !== 0) {
				$this->isGettingOutOfPenaltyBox = true;

				echoln($this->players[$this->currentPlayer] . ' is getting out of the penalty box');
				$this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] + $roll;
				if (11 < $this->places[$this->currentPlayer]) {
					$this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] - 12;
				}

				echoln($this->players[$this->currentPlayer] .
						'\'s new location is ' .
						$this->places[$this->currentPlayer]);
				echoln('The category is ' . $this->currentCategory());
				$this->askQuestion();
			} else {
				echoln($this->players[$this->currentPlayer] . ' is not getting out of the penalty box');
				$this->isGettingOutOfPenaltyBox = false;
			}

		} else {

			$this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] + $roll;
			if (11 < $this->places[$this->currentPlayer]) {
				$this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] - 12;
			}

			echoln($this->players[$this->currentPlayer] .
					'\'s new location is ' .
					$this->places[$this->currentPlayer]);
			echoln('The category is ' . $this->currentCategory());
			$this->askQuestion();
		}

	}

	public function wasCorrectlyAnswered(): bool
	{
		if ($this->inPenaltyBox[$this->currentPlayer]) {
			if ($this->isGettingOutOfPenaltyBox) {
				echoln('Answer was correct!!!!');
				$this->purses[$this->currentPlayer]++;
				echoln($this->players[$this->currentPlayer] .
					' now has ' .
					$this->purses[$this->currentPlayer] .
					' Gold Coins.');

				$winner = $this->didPlayerWin();
				$this->currentPlayer++;
				if (count($this->players) === $this->currentPlayer) {
					$this->currentPlayer = 0;
				}

				return $winner;
			}
			$this->currentPlayer++;
			if (count($this->players) === $this->currentPlayer) {
				$this->currentPlayer = 0;
			}

			return true;

		}

		echoln('Answer was corrent!!!!');
		$this->purses[$this->currentPlayer]++;
		echoln($this->players[$this->currentPlayer] .
				' now has ' .
				$this->purses[$this->currentPlayer] .
				' Gold Coins.');

		$winner = $this->didPlayerWin();
		$this->currentPlayer++;
		if (count($this->players) === $this->currentPlayer) {
			$this->currentPlayer = 0;
		}

		return $winner;

	}

	public function wrongAnswer(): true
	{
		echoln('Question was incorrectly answered');
		echoln($this->players[$this->currentPlayer] . ' was sent to the penalty box');
		$this->inPenaltyBox[$this->currentPlayer] = true;

		$this->currentPlayer++;
		if (count($this->players) === $this->currentPlayer) {
			$this->currentPlayer = 0;
		}

		return true;
	}

	private function currentCategory(): string
	{
		return match ($this->places[$this->currentPlayer]) {
			0, 4, 8 => 'Pop',
			1, 5, 9 => 'Science',
			2, 6, 10 => 'Sports',
			default => 'Rock',
		};
	}

	private function askQuestion(): void
	{
		match ($this->currentCategory()) {
			'Pop' => echoln(array_shift($this->popQuestions)),
			'Science' => echoln(array_shift($this->scienceQuestions)),
			'Sports' => echoln(array_shift($this->sportsQuestions)),
			default => echoln(array_shift($this->rockQuestions)),
		};
	}

	private function didPlayerWin(): bool
	{
		return !(6 === $this->purses[$this->currentPlayer]);
	}

	private function createQuestion(string $name, int $index): string
	{
		return $name . ' Question ' . $index;
	}

	private function createQuestions(): void
	{
		for ($i = 0; 50 > $i; $i++) {
			$this->popQuestions[] = $this->createQuestion('Pop', $i);
			$this->scienceQuestions[] = $this->createQuestion('Science', $i);
			$this->sportsQuestions[] = $this->createQuestion('Sports', $i);
			$this->rockQuestions[] = $this->createQuestion('Rock', $i);
		}
	}
}
