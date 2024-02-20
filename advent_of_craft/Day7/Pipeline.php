<?php

declare(strict_types = 1);

namespace Advent\Day7;

use Advent\Day7\Dependancies\Config;
use Advent\Day7\Dependancies\Emailer;
use Advent\Day7\Dependancies\Logger;
use Advent\Day7\Dependancies\Project;
use Advent\Day7\Dependancies\TestStatus;

class Pipeline
{
	private readonly bool $mailingAvailable;

	public function __construct(
		private readonly Config $config,
		private readonly Emailer $emailer,
		private readonly Logger $log,
	) {
		$this->mailingAvailable = $this->config->sendEmailSummary();
	}

	public function run(Project $project): void
	{
		$testsPassed = $this->testPassed($project);

		$deploySuccessful = $this->deploySuccessful($project);

		$this->logForTestsStatus($project);

		if ($testsPassed) {
			$this->logForDeploymentStatus($deploySuccessful);
		}

		if ($this->mailingAvailable) {
			$this->log->info('Sending email');
			$this->logForEmailingTests($testsPassed, $deploySuccessful);

			return;
		}
		$this->log->info('Email disabled');
	}

	private function logForEmailingTests(bool $testsPassed, bool $deploySuccessful): void
	{
		if ($testsPassed) {
			$this->logForDeploymentEding($deploySuccessful);

			return;
		}
		$this->emailer->send('Tests failed');

	}

	private function logForDeploymentEding(bool $deploySuccessful): void
	{
		if ($deploySuccessful) {
			$this->emailer->send('Deployment completed successfully');

			return;
		}
		$this->emailer->send('Deployment failed');
	}

	private function logForDeploymentStatus(bool $deploySuccessful): void
	{
		if ($deploySuccessful) {
			$this->log->info('Deployment successful');

			return;
		}
		$this->log->error('Deployment failed');
	}

	private function logForTestsStatus(Project $project): void
	{
		match ($project->getTestStatus()) {
			TestStatus::PassingTests => $this->log->info('Tests passed'),
			TestStatus::FailingTests => $this->log->error('Tests failed'),
			TestStatus::NoTests => $this->log->info('No tests'),
		};
	}

	private function deploySuccessful(Project $project): bool
	{
		if ($this->testPassed($project)) {
			return (bool) ('success' === $project->deploy());
		}

		return false;
	}

	private function testPassed(Project $project): bool
	{
		return $project->getTestStatus() !== TestStatus::FailingTests;
	}
}
