<?php

declare(strict_types = 1);

use Advent\Day7\Dependancies\Config;
use Advent\Day7\Dependancies\Emailer;
use Advent\Day7\Dependancies\ProjectBuilder;
use Advent\Day7\Dependancies\TestStatus;
use Advent\Day7\Pipeline;
use Tests\Advent\Day7\CapturingLogger;

describe('Pipeline Tests with sendEmailSummary at true', function (): void {

	beforeEach(function (): void {
		$this->sendEmailSummary = Mockery::mock(Config::class);
		$this->sendEmailSummary->shouldReceive('sendEmailSummary')->andReturn(true);
		$this->config = $this->sendEmailSummary;
		$this->log = new CapturingLogger;
		$this->emailer = Mockery::mock(Emailer::class);
		$this->emailer->shouldReceive('send');
		$this->pipeline = new Pipeline($this->config, $this->emailer, $this->log);
	});

	test('project with tests that deploys successfully with email notification', function (): void {
		$project = new ProjectBuilder;
		$project = $project->setTestStatus(TestStatus::PassingTests)->
			setDeploysSuccessfully(true)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: Tests passed',
				'INFO: Deployment successful',
				'INFO: Sending email',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledWith('Deployment completed successfully');
	});

	test('project with tests that fail with email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::FailingTests)->
			setDeploysSuccessfully(false)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'ERROR: Tests failed',
				'INFO: Sending email',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledWith('Tests failed');
	});

	test('project without tests that deploys successfully with email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::NoTests)->
			setDeploysSuccessfully(true)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: No tests',
				'INFO: Deployment successful',
				'INFO: Sending email',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledWith('Deployment completed successfully');
	});

	test('project with tests and failing build with email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::PassingTests)->
			setDeploysSuccessfully(false)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: Tests passed',
				'ERROR: Deployment failed',
				'INFO: Sending email',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledWith('Deployment failed');
	});

	test('project without tests and failing build with email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::NoTests)->
			setDeploysSuccessfully(false)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: No tests',
				'ERROR: Deployment failed',
				'INFO: Sending email',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledWith('Deployment failed');
	});
});

describe('Pipeline Tests with sendEmailSummary at false', function (): void {

	beforeEach(function (): void {
		$this->sendEmailSummary = Mockery::mock(Config::class);
		$this->sendEmailSummary->shouldReceive('sendEmailSummary')->andReturn(false);
		$this->config = $this->sendEmailSummary;
		$this->log = new CapturingLogger;
		$this->emailer = Mockery::mock(Emailer::class);
		$this->emailer->shouldReceive('send');
		$this->pipeline = new Pipeline($this->config, $this->emailer, $this->log);
	});

	test('project with tests that deploys successfully without email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::PassingTests)->
			setDeploysSuccessfully(true)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: Tests passed',
				'INFO: Deployment successful',
				'INFO: Email disabled',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledTimes(0);
	});

	test('project without tests that deploys successfully without email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::NoTests)->
			setDeploysSuccessfully(true)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: No tests',
				'INFO: Deployment successful',
				'INFO: Email disabled',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledTimes(0);
	});

	test('project with tests that fail without email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::FailingTests)->
			setDeploysSuccessfully(false)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'ERROR: Tests failed',
				'INFO: Email disabled',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledTimes(0);
	});

	test('project with tests and failing build without email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::PassingTests)->
			setDeploysSuccessfully(false)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: Tests passed',
				'ERROR: Deployment failed',
				'INFO: Email disabled',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledTimes(0);
	});

	test('project without tests and failing build without email notification', function (): void {
		$project = new ProjectBuilder;

		$project = $project->setTestStatus(TestStatus::NoTests)->
			setDeploysSuccessfully(false)->
			build();

		$this->pipeline->run($project);

		expect($this->log->loggedLines())->toBe(
			[
				'INFO: No tests',
				'ERROR: Deployment failed',
				'INFO: Email disabled',
			]
		);
		// expect($this->emailer->send)->toHaveBeenCalledTimes(0);
	});
});
