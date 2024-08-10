<?php declare(strict_types = 1);

namespace Dravencms\Captcha\Forms;

use Dravencms\Captcha\CaptchaProvider;
use Nette\Forms\Controls\TextInput;
use Nette\Forms\Form;
use Nette\Forms\Rules;
use Nette\Utils\Html;

interface ICaptchaField /* extends TextInput*/
{

	
	public function loadHttpData(): void;

	public function validate(): void;

	public function getRules(): Rules;

	public function verify(): bool;

	public function getControl(): Html;

	public function configureValidation(): void;
}
