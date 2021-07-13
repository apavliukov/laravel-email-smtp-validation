# Laravel Email SMTP Validation

Laravel package for simpler usage of [zytzagoo/smtp-validate-email](https://github.com/zytzagoo/smtp-validate-email) package to check if email really exists. It retrieves MX records for the email domain and then connects to the domain's SMTP server to try figuring out if the address really exists.

## Installation

```bash
composer require apavliukov/laravel-email-smtp-validation
```

## Usage

### Config
You can copy config file

```bash
php artisan vendor:publish --tag=email-smtp-validation-config
```

If you want to disable SMTP check on some environments, you can pass them in config on key `disable_on_env`. By default, `local` env is disabled to allow you to use fake emails during development.

### Rule

For example, in your request class you can use `Rules\EmailSmtpVerified` rule like here

```injectablephp
use AlexPavliukov\EmailSmtpValidation\Rules\EmailSmtpVerified;
...

class ValidateEmailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                app(EmailSmtpVerified::class),
            ],
        ];
    }
}
```
