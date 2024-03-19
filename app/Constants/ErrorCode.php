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

namespace App\Constants;

use Hyperf\Constants\Annotation\Constants;
use Hyperf\Constants\EnumConstantsTrait;

#[Constants]
enum ErrorCode: int implements ErrorCodeInterface
{
    use EnumConstantsTrait;

    /**
     * @Message("Server Error")
     */
    case SERVER_ERROR = 500;

    public function getMessage(?array $translate = null): string
    {
        $arguments = [];
        if ($translate) {
            $arguments = [$translate];
        }

        return $this->__call('getMessage', $arguments);
    }
}
