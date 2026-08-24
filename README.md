# DravenCMS CAPTCHA Interfaces

Provider contracts shared by the DravenCMS CAPTCHA integration and its concrete adapters. Applications normally install `dravencms/captcha` and one provider rather than using this library directly.

## Contracts

- `ICaptchaProvider` creates a form field through `prepareField()`.
- `ICaptchaField` extends the Nette Forms control contract with `verify()` and the methods needed for validation and rendering.

## Installation

```bash
composer require dravencms/icaptcha
```

## Implementing a Provider

Implement `Dravencms\Captcha\ICaptchaProvider` and return a control implementing `Dravencms\Captcha\Forms\ICaptchaField`:

```php
final class CaptchaProvider implements ICaptchaProvider
{
    public function prepareField(string $label, ?string $message = null): ICaptchaField
    {
        return new CaptchaField($this, $label, $message);
    }
}
```

Provider packages should expose their implementation as a DI service and declare that they provide `dravencms/captcha-implementation` in Composer metadata.

## License

This package is licensed under the LGPL-3.0 license.
