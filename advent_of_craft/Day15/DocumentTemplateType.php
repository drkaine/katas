<?php

declare(strict_types = 1);

namespace Advent\Day15;

use InvalidArgumentException;

class DocumentTemplateType
{
	public function __construct(
		private $documentType,
		private RecordType $recordType,
	) {
	}

	public static function fromDocumentTypeAndRecordType($documentType, $recordType)
	{
		foreach (self::getConstants() as $dtt) {
			if (strcasecmp($dtt->getDocumentType(), $documentType) === 0 &&
				$dtt->getRecordType() === $recordType) {
				return $dtt;
			} elseif (strcasecmp($dtt->getDocumentType(), $documentType) === 0 &&
				$dtt->getRecordType() === RecordType::ALL) {
				return $dtt;
			}
		}

		throw new InvalidArgumentException('Invalid Document template type or record type');
	}

	private function getRecordType()
	{
		return $this->recordType;
	}

	private function getDocumentType()
	{
		return $this->documentType;
	}

	private static function getConstants()
	{
		return [
			new self('DEER', RecordType::INDIVIDUAL_PROSPECT),
			new self('DEER', RecordType::LEGAL_PROSPECT),
			new self('AUTP', RecordType::INDIVIDUAL_PROSPECT),
			new self('AUTM', RecordType::LEGAL_PROSPECT),
			new self('SPEC', RecordType::ALL),
			new self('GLPP', RecordType::INDIVIDUAL_PROSPECT),
			new self('GLPM', RecordType::LEGAL_PROSPECT),
		];
	}
}
