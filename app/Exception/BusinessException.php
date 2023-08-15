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

namespace App\Exception;

use App\Constants\ErrorCodeInterface;
use Hyperf\Server\Exception\ServerException;
use Throwable;

class BusinessException extends ServerException
{
    public function __construct(ErrorCodeInterface $code, string $message = null, Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = $code->getMessage();
        }

        parent::__construct($message, $code->value, $previous);
    }
}
