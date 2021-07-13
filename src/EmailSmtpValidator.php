<?php

namespace AlexPavliukov\EmailSmtpValidation;

use SMTPValidateEmail\Validator as SmtpEmailValidator;

class EmailSmtpValidator
{
    protected SmtpEmailValidator $validator;

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
    public function validate($emails = [], string $sender = null): array
    {
        return $this->validator->validate($emails, $sender);
    }
}
