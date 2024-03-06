<?php

declare(strict_types = 1);

namespace Advent\Day21;

interface FileSystem
{
	public function getFiles($directoryName);

	public function writeAllText($filePath, $content);

	public function readAllLines($filePath);
}
