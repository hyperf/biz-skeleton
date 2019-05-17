<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Kernel\Log;

use Psr\Container\ContainerInterface;
use Hyperf\Logger\LoggerFactory as HyperfLoggerFactory;

class LoggerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return $container->get(HyperfLoggerFactory::class)->make();
    }
}
