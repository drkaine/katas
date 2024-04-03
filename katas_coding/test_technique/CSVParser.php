<?php

declare(strict_types = 1);

namespace Katas\test_technique;

class CSVParser implements FileParserInterface
{
	private string $text;

	public function __construct(string $filePath)
	{
		$this->text = \file_get_contents($filePath);
	}

	public function stringToArray(): array
	{
		$folderList = explode("\n", $this->text);

		return array_map([$this, 'layoutText'], $folderList);
	}

	private function layoutText(string $text)
	{
		$array = trim($text);

		return explode(';', $array);
	}
}
