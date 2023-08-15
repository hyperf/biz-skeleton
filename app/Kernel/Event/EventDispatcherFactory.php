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

namespace App\Kernel\Event;

use Hyperf\Event\EventDispatcher;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

class EventDispatcherFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $listeners = $container->get(ListenerProviderInterface::class);
        return new EventDispatcher($listeners);
    }
}
