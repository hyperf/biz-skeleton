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

namespace App\Jobs;

use Hyperf\Amqp\Producer;
use Hyperf\AsyncQueue\Job;
use Hyperf\Amqp\Message\ProducerMessageInterface;

class AmqpProducerJob extends Job
{
    public $message;

    protected $maxAttempts = 2;

    public function __construct(ProducerMessageInterface $message)
    {
        $this->message = $message;
    }

    public function handle()
    {
        retry($this->getMaxAttempts(), function () {
            di()->get(Producer::class)->produce($this->message, true);
        });
    }
}
