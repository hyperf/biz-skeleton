<?php

return [
    'handler' => [
        'http' => [
            App\Exception\Handler\BusinessExceptionHandler::class,
        ],
    ],
];