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

namespace App\Kernel\Packers;

use Hyperf\Contract\PackerInterface;

class RawPacker implements PackerInterface
{
    public function pack($data): string
    {
        return (string) $data;
    }

    public function unpack(string $data)
    {
        return $data;
    }
}
