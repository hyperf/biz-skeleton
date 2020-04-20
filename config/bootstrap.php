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
use App\Kernel\Context\Coroutine;

/**
 * @return bool|int
 */
function go(callable $callable)
{
    $id = di()->get(Coroutine::class)->create($callable);
    return $id > 0 ? $id : false;
}
