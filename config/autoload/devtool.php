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
            'namespace' => 'App\\Aspect',
        ],
        'command' => [
            'namespace' => 'App\\Command',
        ],
        'controller' => [
            'namespace' => 'App\\Controller',
        ],
        'job' => [
            'namespace' => 'App\\Job',
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
