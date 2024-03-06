<?php

declare(strict_types = 1);

namespace Advent\Day21;

use Carbon\Carbon;

class AuditManager
{
	private $maxEntriesPerFile;

	private $directoryName;

	private $fileSystem;

	public function __construct($maxEntriesPerFile, $directoryName, $fileSystem)
	{
		$this->maxEntriesPerFile = $maxEntriesPerFile;
		$this->directoryName = $directoryName;
		$this->fileSystem = $fileSystem;
	}

	public function addRecord($visitorName, Carbon $timeOfVisit): void
	{
		$filePaths = $this->fileSystem->getFiles($this->directoryName);
		$sorted = $this->sortByIndex($filePaths);
		$dateTimeFormatter = 'Y-m-d H:i:s';
		$newRecord = $visitorName . ';' . $timeOfVisit->format($dateTimeFormatter);

		if (count($sorted) === 0) {
			$newFile = $this->directoryName . DIRECTORY_SEPARATOR . 'audit_1.txt';
			$this->fileSystem->writeAllText($newFile, $newRecord);

			return;
		}

		$currentFileIndex = count($sorted) - 1;
		$currentFilePath = $sorted[$currentFileIndex];
		$lines = $this->fileSystem->readAllLines($currentFilePath);

		if (count($lines) < $this->maxEntriesPerFile) {
			$lines[] = $newRecord;
			$newContent = implode(PHP_EOL, $lines);
			$this->fileSystem->writeAllText($currentFilePath, $newContent);
		} else {
			$newName = 'audit_' . ($currentFileIndex + 2) . '.txt';
			$newFile = $this->directoryName . DIRECTORY_SEPARATOR . $newName;
			$this->fileSystem->writeAllText($newFile, $newRecord);
		}
	}

	private function sortByIndex($filePaths)
	{
		sort($filePaths);

		return $filePaths;
	}
}
