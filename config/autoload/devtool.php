<?php

return [
    'generator' => [
        'amqp' => [
            'consumer' => [
                'namespace' => 'App\\Amqp\\Consumers',
            ],
            'producer' => [
                'namespace' => 'App\\Amqp\\Producers',
            ],
        ],
        'aspect' => [
            'namespace' => 'App\\Aspects',
        ],
        'command' => [
            'namespace' => 'App\\Commands',
        ],
        'controller' => [
            'namespace' => 'App\\Controllers',
        ],
        'job' => [
            'namespace' => 'App\\Jobs',
        ],
        'listener' => [
            'namespace' => 'App\\Listeners',
        ],
        'middleware' => [
            'namespace' => 'App\\Middlewares',
        ],
        'Process' => [
            'namespace' => 'App\\Processes',
        ],
    ],
];
