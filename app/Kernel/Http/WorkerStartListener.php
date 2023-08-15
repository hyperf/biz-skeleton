<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Kernel\Http;

use Hyperf\Framework\Logger\StdoutLogger;
use Hyperf\Server\Listener\AfterWorkerStartListener;
use Psr\Container\ContainerInterface;

class WorkerStartListener extends AfterWorkerStartListener
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container->get(StdoutLogger::class));
    }
}
