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

namespace App\Kernel\Log;

use Hyperf\Utils\Context;
use Monolog\Processor\ProcessorInterface;

class AppendRequestIdProcessor implements ProcessorInterface
{
    const REQUEST_ID = 'log.request.id';

    public function __invoke(array $records)
    {
        $records['context']['request_id'] = Context::getOrSet(self::REQUEST_ID, uniqid());

        return $records;
    }
}
