<?php

declare(strict_types = 1);

use Advent\Day21\AuditManager;
use Advent\Day21\FileSystem;
use Carbon\Carbon;

it('adds new visitor to a new file when end of last file is reached', function (): void {
	$fileSystemMock = Mockery::mock(FileSystem::class);
	$fileSystemMock->shouldReceive('getFiles')->with('audits')->andReturn([
		'audits/audit_2.txt',
		'audits/audit_1.txt',
	]);
	$fileSystemMock->shouldReceive('readAllLines')->with('audits/audit_2.txt')->andReturn([
		'Peter;2019-04-06 16:30:00',
		'Jane;2019-04-06 16:40:00',
		'Jack;2019-04-06 17:00:00',
	]);
	$fileSystemMock->shouldReceive('writeAllText')->with('audits/audit_3.txt', 'Alice;2019-04-06 18:00:00');

	$sut = new AuditManager(3, 'audits', $fileSystemMock);

	$sut->addRecord('Alice', Carbon::createFromFormat('Y-m-d H:i:s', '2019-04-06 18:00:00'));
});
