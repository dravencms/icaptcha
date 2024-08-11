<?php declare(strict_types = 1);

namespace Dravencms\Captcha;

use Dravencms\Captcha\Forms\ICaptchaField;

interface ICaptchaProvider
{
    public function prepareField(string $label, ?string $message = null): ICaptchaField;
}
