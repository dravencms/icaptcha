<?php declare(strict_types = 1);

namespace Dravencms\Captcha\Forms;

use Dravencms\Captcha\CaptchaProvider;
use Nette\Forms\Container;

final class CaptchaBinding
{

	public static function bind(CaptchaProvider $provider, string $name = 'addCaptcha'): void
	{
		// Bind to form container
		Container::extensionMethod($name, function (Container $container, string $name = 'captcha', string $label = 'Captcha', bool|string $required = true, ?string $message = null) use ($provider): CaptchaField {
			$field = new CaptchaField($provider, $label, $message);
			$field->setRequired($required);
			$container[$name] = $field;

			return $field;
		});
	}

}
