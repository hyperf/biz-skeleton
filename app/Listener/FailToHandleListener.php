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
namespace App\Listener;

use Hyperf\Command\Event\FailToHandle;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;

#[Listener]
class FailToHandleListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            FailToHandle::class,
        ];
    }

    /**
     * @param FailToHandle $event
     */
    public function process(object $event): void
    {
        echo (string) $event->getThrowable();
    }
}
