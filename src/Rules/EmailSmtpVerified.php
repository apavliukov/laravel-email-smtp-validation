<?php

namespace AlexPavliukov\EmailSmtpValidation\Rules;

use AlexPavliukov\EmailSmtpValidation\EmailSmtpValidator;
use Illuminate\Contracts\Validation\Rule;

class EmailSmtpVerified implements Rule
{
	protected EmailSmtpValidator $validator;

	/**
	 * Create a new rule instance.
	 *
	 * @param  \AlexPavliukov\EmailSmtpValidation\EmailSmtpValidator  $validator
	 */
	public function __construct(EmailSmtpValidator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param  string  $attribute
	 * @param  mixed  $value
	 * @return bool
	 */
	public function passes($attribute, $value): bool
	{
		if ($this->validator->isDisabledInEnv()) {
			return true;
		}

		$passes = false;

		try {
			$validationResult = $this->validator->validate($value);
			$passes = $validationResult[$value];
		} catch (\Exception $exception) {
		}

		return $passes;
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message(): string
	{
		return __('validation.email');
	}
}
