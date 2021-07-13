<?php

namespace AlexPavliukov\EmailSmtpValidation\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array validate($emails = [], $sender = null)
 *
 * @see \AlexPavliukov\EmailSmtpValidation\EmailSmtpValidator
 */
class EmailSmtpValidator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AlexPavliukov\EmailSmtpValidation\EmailSmtpValidator::class;
    }
}
