<?php

declare(strict_types = 1);

use Katas\test_technique\CSVParser;
use Katas\test_technique\PathFolder;

beforeEach(function (): void {
	$this->CSVParser = new CSVParser('./tests/Katas/datas_tests/csv-directory.txt');

	$this->pathFolder = new PathFolder($this->CSVParser);
});

test('Give me the path of ', function (string $directoryName, string $pathWanted): void {
	expect($this->pathFolder->getPath($directoryName))->toBe($pathWanted);
})->with([
	['Dir4', '/Dir1/Dir2/Dir4'],
	['Dir14', '/Dir5/Dir7/Dir12/Dir13/Dir14'],
	['Dir1', '/Dir1'],
]);
