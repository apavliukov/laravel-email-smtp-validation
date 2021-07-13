<?php

namespace AlexPavliukov\EmailSmtpValidation;

use SMTPValidateEmail\Validator as SmtpEmailValidator;

class EmailSmtpValidator
{
    protected SmtpEmailValidator $validator;
    protected ?array $validationResult = null;

    public function __construct(SmtpEmailValidator $validator)
    {
        $this->validator = $validator;
    }

	/**
	 * @param  array|string  $emails  Email(s) to validate
	 * @param  string|null  $sender  Sender's email address
	 *
	 * @return array
	 */
    public function getValidationResult($emails = [], string $sender = null): array
    {
	    return $this->validator->validate($emails, $sender);
    }

    /**
     * @param  array|string  $emails  Email(s) to validate
     * @param  string|null  $sender  Sender's email address
     *
     * @return bool
     */
    public function validate($emails = [], string $sender = null): bool
    {
        $this->validationResult = $this->validator->validate($emails, $sender);

        foreach ($this->validationResult as $value) {
        	if ($value === false) {
        		return false;
	        }
        }

        return true;
    }

    public function isDisabledInEnv(): bool
    {
    	return in_array(config('app.env'), config('email-smtp-validation.disable_on_env'), true);
    }
}
