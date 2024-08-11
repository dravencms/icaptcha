<?php declare(strict_types = 1);

namespace Dravencms\Captcha\Forms;

use Nette\Forms\Control;
use Nette\Forms\Rules;
use Nette\Utils\Html;

interface ICaptchaField  extends Control
{

	
	public function loadHttpData(): void;

	public function validate(): void;

	public function getRules(): Rules;

	public function verify(): bool;

	public function getControl(): Html;
}
