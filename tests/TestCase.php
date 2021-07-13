<?php

namespace Tests;

use AlexPavliukov\EmailSmtpValidation\Providers\EmailSmtpValidationServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
	protected function getPackageProviders($app): array
	{
		return [
			EmailSmtpValidationServiceProvider::class,
		];
	}
}
