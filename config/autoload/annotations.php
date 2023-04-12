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
return [
    'scan' => [
        'paths' => [
            BASE_PATH . '/app',
        ],
        'ignore_annotations' => [
            'mixin',
        ],
        'class_map' => [
            Hyperf\Coroutine\Coroutine::class => BASE_PATH . '/app/Kernel/ClassMap/Coroutine.php',
            Hyperf\Di\Resolver\ResolverDispatcher::class => BASE_PATH . '/app/Kernel/ClassMap/ResolverDispatcher.php',
        ],
    ],
];
