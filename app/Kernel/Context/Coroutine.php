<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Kernel\Context;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\Formatter\FormatterInterface;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;
use Swoole\Coroutine as SwooleCoroutine;

class Coroutine
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    /**
     * @var null|FormatterInterface
     */
    protected $formatter;

    /**
     * @var ConfigInterface
     */
    protected $config;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->logger = $container->get(StdoutLoggerInterface::class);
        $this->config = $container->get(ConfigInterface::class);
        if ($container->has(FormatterInterface::class)) {
            $this->formatter = $container->get(FormatterInterface::class);
        }
    }

    public function getContext(): array
    {
        $data = [];
        foreach ($this->config->get('context.copy', []) as $key) {
            $data[$key] = Context::get($key);
        }

        return $data;
    }

    public function setContext(array $data): void
    {
        foreach ($data as $key => $value) {
            Context::set($key, $value);
        }
    }

    /**
     * @return int Returns the coroutine ID of the coroutine just created.
     *             Returns -1 when coroutine create failed.
     */
    public function create(callable $callable): int
    {
        $data = $this->getContext();
        $result = SwooleCoroutine::create(function () use ($callable, $data) {
            try {
                $this->setContext($data);
                call($callable);
            } catch (Throwable $throwable) {
                if ($this->formatter) {
                    $this->logger->warning($this->formatter->format($throwable));
                } else {
                    $this->logger->warning((string) $throwable);
                }
            }
        });
        return is_int($result) ? $result : -1;
    }
}
