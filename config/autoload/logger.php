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
use App\Kernel\Log\AppendRequestIdProcessor;
use Hyperf\Logger\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler as MonologStreamHandler;
use Monolog\Level;

return [
    'default' => 'default',
    'channels' => [
        'default' => [
            'handler' => [
                'class' => class_exists(StreamHandler::class) ? StreamHandler::class : MonologStreamHandler::class,
                'constructor' => [
                    'stream' => BASE_PATH . '/runtime/logs/hyperf.log',
                    'level' => Level::Info,
                ],
            ],
            'formatter' => [
                'class' => LineFormatter::class,
                'constructor' => [
                    'format' => null,
                    'dateFormat' => 'Y-m-d H:i:s',
                    'allowInlineLineBreaks' => true,
                ],
            ],
            'processors' => [
                [
                    'class' => AppendRequestIdProcessor::class,
                ],
            ],
        ],
    ],
];
