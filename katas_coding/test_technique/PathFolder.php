<?php

declare(strict_types = 1);

namespace Katas\test_technique;

class PathFolder
{
	private const SEPARATION = '/';

	private array $folderList;

	public function __construct(FileParserInterface $fileParser)
	{
		$this->folderList = $fileParser->stringToArray();
	}

	public function getPath(?string $folderName): string
	{
		$path = self::SEPARATION . $folderName;

		$parent = $this->getParentFolder($folderName);

		return $parent ? $this->getPath($parent) . $path : $path;
	}

	private function getParentFolder(?string $folderName): string | null
	{
		$getParentFolderName = function (array | string $parenting) use ($folderName) {
			if ($parenting[0] === $folderName) {
				return $parenting[1];
			}
		};

		$parent = array_map($getParentFolderName, $this->folderList);
		sort($parent);

		return array_pop($parent);

	}
}
