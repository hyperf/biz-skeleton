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

class Context
{
    /**
     * @var ConfigInterface
     */
    protected $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function getContext(): array
    {
        $data = [];
        foreach ($this->config->get('context.copy', []) as $key) {
            $data[$key] = \Hyperf\Utils\Context::get($key);
        }

        return $data;
    }

    public function setContext(array $data): void
    {
        foreach ($data as $key => $value) {
            \Hyperf\Utils\Context::set($key, $value);
        }
    }
}
