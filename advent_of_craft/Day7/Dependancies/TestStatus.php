<?php

declare(strict_types = 1);

namespace Advent\Day7\Dependancies;

enum TestStatus
{
	case NoTests;
	case PassingTests;
	case FailingTests;
}
