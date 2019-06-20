<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'packages' => [
        'hyperf/json-rpc' => [
            'version' => '~1.0.0',
        ],
        'hyperf/rpc' => [
            'version' => '~1.0.0',
        ],
        'hyperf/rpc-client' => [
            'version' => '~1.0.0',
        ],
        'hyperf/rpc-server' => [
            'version' => '~1.0.0',
        ],
        'hyperf/grpc-client' => [
            'version' => '~1.0.0',
        ],
        'hyperf/grpc-server' => [
            'version' => '~1.0.0',
        ],
    ],
    'require-dev' => [
    ],
    'questions' => [
        'rpc' => [
            'question' => 'Which rpc component do you want to use?',
            'default' => 'n',
            'required' => false,
            'custom-package' => true,
            'options' => [
                1 => [
                    'name' => 'json-rpc',
                    'packages' => [
                        'hyperf/json-rpc',
                        'hyperf/rpc',
                        'hyperf/rpc-client',
                        'hyperf/rpc-server',
                    ],
                    'resources' => [
                    ],
                ],
                2 => [
                    'name' => 'grpc',
                    'packages' => [
                        'hyperf/grpc-client',
                        'hyperf/grpc-server',
                    ],
                    'resources' => [
                    ],
                ],
            ],
        ],
    ],
];
