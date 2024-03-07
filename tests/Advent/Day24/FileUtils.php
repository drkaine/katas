<?php

declare(strict_types = 1);

namespace Tests\Advent\Day24;

use Exception;

class FileUtils
{
	public static function getInputAsString(string $input): string
	{
		$filePath = self::getResourcePath($input);

		return file_get_contents($filePath);
	}

	public static function getInputAsSeparatedLines(string $input): array
	{
		$fileContent = self::getInputAsString($input);

		return explode(PHP_EOL, $fileContent);
	}

	private static function getResourcePath(string $input): string
	{
		$resourcePath = __DIR__ . '/../../resources/' . $input;
		if (!file_exists($resourcePath)) {
			throw new Exception("Input file not found: {$input}");
		}

		return $resourcePath;
	}
}
