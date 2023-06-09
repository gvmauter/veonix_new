<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Process;

use Symfony\Component\Process\Exception\RuntimeException;

/**
 * PhpProcess runs a PHP script in an independent process.
 *
 *     $p = new PhpProcess('<?php echo "foo"; ?>');
 *     $p->run();
 *     print $p->getOutput()."\n";
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class PhpProcess extends Process
{
	/**
	 * @param string $script The PHP script to run (as a string)
	 * @param string|null $cwd The working directory or null to use the working dir of the current PHP process
	 * @param array|null $env The environment variables or null to use the same environment as the current PHP process
	 * @param int $timeout The timeout in seconds
	 * @param array|null $php Path to the PHP binary to use with any additional arguments
	 */
	public function __construct(string $script, string $cwd = NULL, array $env = NULL, int $timeout = NULL, array $php = NULL)
	{
		if (is_null($timeout)) {
			$timeout = 60;
		}
		if (NULL === $php) {
			$executableFinder = new PhpExecutableFinder();
			$php = $executableFinder->find(false);
			$php = false === $php ? NULL : array_merge([$php], $executableFinder->findArguments());
		}
		if ('phpdbg' === \PHP_SAPI) {
			$file = tempnam(sys_get_temp_dir(), 'dbg');
			\CAmminaOptimizer::SaveFileContent($file, $script);
			register_shutdown_function('unlink', $file);
			$php[] = $file;
			$script = NULL;
		}

		parent::__construct($php, $cwd, $env, $script, $timeout);
	}

	/**
	 * Sets the path to the PHP binary to use.
	 *
	 * @deprecated since Symfony 4.2, use the $php argument of the constructor instead.
	 */
	public function setPhpBinary($php)
	{
		@trigger_error(sprintf('The "%s()" method is deprecated since Symfony 4.2, use the $php argument of the constructor instead.', __METHOD__), E_USER_DEPRECATED);

		$this->setCommandLine($php);
	}

	/**
	 * {@inheritdoc}
	 */
	public function start(callable $callback = NULL, array $env = [])
	{
		if (NULL === $this->getCommandLine()) {
			throw new RuntimeException('Unable to find the PHP executable.');
		}

		parent::start($callback, $env);
	}
}
