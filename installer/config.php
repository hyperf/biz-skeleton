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
            'version' => 'dev-master',
        ],
        'hyperf/rpc' => [
            'version' => 'dev-master',
        ],
        'hyperf/rpc-client' => [
            'version' => 'dev-master',
        ],
        'hyperf/rpc-server' => [
            'version' => 'dev-master',
        ],
        'hyperf/grpc-client' => [
            'version' => 'dev-master',
        ],
        'hyperf/grpc-server' => [
            'version' => 'dev-master',
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
