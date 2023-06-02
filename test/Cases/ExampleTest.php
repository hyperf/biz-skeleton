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
namespace HyperfTest\Cases;

use App\Kernel\Context\Coroutine;
use App\Kernel\Log\AppendRequestIdProcessor;
use Hyperf\Context\Context;
use Hyperf\Di\Definition\FactoryDefinition;
use Hyperf\Di\Resolver\FactoryResolver;
use Hyperf\Di\Resolver\ResolverDispatcher;
use Hyperf\Engine\Channel;
use Hyperf\Support\Reflection\ClassInvoker;
use Hyperf\Testing\TestCase;
use Mockery;
use Psr\Container\ContainerInterface;
use Throwable;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);

        $this->get('/')
            ->assertOk()
            ->assertJson([
                'code' => 0,
                'data' => [
                    'message' => 'Hello Hyperf.',
                    'method' => 'GET',
                    'user' => 'Hyperf',
                ],
            ]);

        $this->get('/', ['user' => 'limx'])
            ->assertOk()
            ->assertJson([
                'code' => 0,
                'data' => [
                    'message' => 'Hello Hyperf.',
                    'method' => 'GET',
                    'user' => 'limx',
                ],
            ]);

        $res = $this->post('/', ['user' => 'limx'])
            ->assertOk()
            ->assertJson([
                'code' => 0,
                'data' => [
                    'message' => 'Hello Hyperf.',
                    'method' => 'POST',
                    'user' => 'limx',
                ],
            ]);

        Context::set(AppendRequestIdProcessor::REQUEST_ID, $id = uniqid());
        $pool = new Channel(1);
        di()->get(Coroutine::class)->create(function () use ($pool) {
            try {
                $all = Context::getContainer();
                $pool->push((array) $all);
            } catch (Throwable $exception) {
                $pool->push(false);
            }
        });

        $data = $pool->pop();
        $this->assertIsArray($data);
        $this->assertSame($id, $data[AppendRequestIdProcessor::REQUEST_ID]);
    }

    public function testGetDefinitionResolver()
    {
        $container = Mockery::mock(ContainerInterface::class);
        $dispatcher = new ClassInvoker(new ResolverDispatcher($container));
        $resolver = $dispatcher->getDefinitionResolver(Mockery::mock(FactoryDefinition::class));
        $this->assertInstanceOf(FactoryResolver::class, $resolver);
        $this->assertSame($resolver, $dispatcher->factoryResolver);

        $resolver2 = $dispatcher->getDefinitionResolver(Mockery::mock(FactoryDefinition::class));
        $this->assertInstanceOf(FactoryResolver::class, $resolver2);
        $this->assertSame($resolver2, $dispatcher->factoryResolver);
    }
}
