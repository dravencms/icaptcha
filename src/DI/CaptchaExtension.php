<?php declare(strict_types = 1);

namespace Dravencms\Captcha\DI;

use Dravencms\Captcha\Forms\CaptchaBinding;
use Dravencms\Captcha\CaptchaProvider;
use Nette\DI\CompilerExtension;
use Nette\PhpGenerator\ClassType;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

final class CaptchaExtension extends CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'provider' => Expect::string()->required()->dynamic(),
			'field' => Expect::string()->required()->dynamic(),
		]);
	}

	/**
	 * Register services
	 */
	public function loadConfiguration(): void
	{
		$config = (array) $this->getConfig();
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('provider'))
			->setFactory(CaptchaProvider::class, [$config['siteKey'], $config['secretKey'], $config['minimalScore']]);
	}

	/**
	 * Decorate initialize method
	 */
	public function afterCompile(ClassType $class): void
	{
		$method = $class->getMethod('initialize');
		$method->addBody(sprintf('%s::bind($this->getService(?));', CaptchaBinding::class), [$this->prefix('provider')]);
	}

}
