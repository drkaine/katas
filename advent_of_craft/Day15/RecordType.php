<?php

declare(strict_types = 1);

namespace Advent\Day15;

enum RecordType: string
{
	case INDIVIDUAL_PROSPECT = 'IndividualPersonProspect';
	case LEGAL_PROSPECT = 'LegalEntityProspect';
	case ALL = 'All';
}
