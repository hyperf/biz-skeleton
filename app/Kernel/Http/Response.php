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

namespace App\Kernel\Http;

use Hyperf\Context\ResponseContext;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\HttpMessage\Cookie\Cookie;
use Hyperf\HttpMessage\Exception\BadRequestHttpException;
use Hyperf\HttpMessage\Exception\HttpException;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;
use Swow\Psr7\Message\ResponsePlusInterface;

class Response
{
    public const OK = 0;

    protected ResponseInterface $response;

    public function __construct(protected ContainerInterface $container)
    {
        $this->response = $container->get(ResponseInterface::class);
    }

    public function success(mixed $data = []): ResponsePlusInterface
    {
        return $this->response->json([
            'code' => 0,
            'data' => $data,
        ]);
    }

    public function fail(int $code, string $message = ''): ResponsePlusInterface
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
        ]);
    }

    public function redirect($url, int $status = 302): ResponsePlusInterface
    {
        return $this->response()
            ->setHeader('Location', (string) $url)
            ->setStatus($status);
    }

    public function cookie(Cookie $cookie)
    {
        ResponseContext::set($this->response()->withCookie($cookie));
        return $this;
    }

    public function handleException(HttpException $throwable): ResponsePlusInterface
    {
        if ($throwable instanceof BadRequestHttpException) {
            di()->get(StdoutLoggerInterface::class)->warning('body: ' . $throwable->getRequest()?->getBody() . ' ' . $throwable);
        }

        return $this->response()
            ->addHeader('Server', 'Hyperf')
            ->setStatus($throwable->getStatusCode())
            ->setBody(new SwooleStream($throwable->getMessage()));
    }

    public function response(): ResponsePlusInterface
    {
        return ResponseContext::get();
    }
}
