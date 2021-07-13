<?php

namespace Tests\Unit;

use AlexPavliukov\EmailSmtpValidation\EmailSmtpValidator;
use Faker\Factory;
use Illuminate\Support\Str;
use Mockery\MockInterface;
use Tests\TestCase;

class EmailValidationTest extends TestCase
{
	public function test_fail_if_email_does_not_exist()
	{
		$email = Factory::create()->email;

		$mock = $this->mock(EmailSmtpValidator::class, function (MockInterface $mock) use ($email) {
			$mock->shouldReceive('validate')->with($email)->once()->andReturnFalse();
		});

		$valid = $mock->validate($email);

		$this->assertFalse($valid);
	}

	public function test_fail_if_email_is_empty()
	{
		$email = '';

		$mock = $this->mock(EmailSmtpValidator::class, function (MockInterface $mock) use ($email) {
			$mock->shouldReceive('validate')->with($email)->once()->andReturnFalse();
		});

		$valid = $mock->validate($email);

		$this->assertFalse($valid);
	}

	public function test_fail_if_wrong_email()
	{
		$email = Str::random();

		$mock = $this->mock(EmailSmtpValidator::class, function (MockInterface $mock) use ($email) {
			$mock->shouldReceive('validate')->with($email)->once()->andReturnFalse();
		});

		$valid = $mock->validate($email);

		$this->assertFalse($valid);
	}

	public function test_success_if_email_exists()
	{
		$email = 'info@google.com';

		$mock = $this->mock(EmailSmtpValidator::class, function (MockInterface $mock) use ($email) {
			$mock->shouldReceive('validate')->with($email)->once()->andReturnTrue();
		});

		$valid = $mock->validate($email);

		$this->assertTrue($valid);
	}
}
