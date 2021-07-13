<?php

namespace AlexPavliukov\EmailSmtpValidation\Providers;

use Illuminate\Support\ServiceProvider;

class EmailSmtpValidationServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../../config/email-smtp-validation.php' => config_path('email-smtp-validation.php')
		], 'email-smtp-validation-config');

		$this->mergeConfigFrom(__DIR__ . '/../../config/email-smtp-validation.php', 'email-smtp-validation');
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
