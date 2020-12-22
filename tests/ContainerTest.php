<?php

/*
 * Part of the Permissions package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Permissions
 * @version    2.1.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2019, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Permissions\Tests;

use PHPUnit\Framework\TestCase;
use Cartalyst\Permissions\Container;

class ContainerTest extends TestCase
{
    /**
     * The permissions container instance.
     *
     * @var \Cartalyst\Permissions\Container
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->container = new Container('main');
    }

    /** @test */
    public function a_container_can_be_instantiated()
    {
        $container = new Container('main');

        $this->assertInstanceOf(Container::class, $container);
    }

    /** @test */
    public function a_container_can_be_instantiated_and_have_attributes()
    {
        $container       = new Container('foo');
        $container->name = 'Foo';

        $this->assertSame('foo', $container->id);
        $this->assertSame('Foo', $container->name);

        $container = new Container('foo', function ($container) {
            $container->name = 'Foo';
        });

        $this->assertSame('foo', $container->id);
        $this->assertSame('Foo', $container->name);
    }

    /** @test */
    public function a_container_group_can_be_instantiated_and_have_attributes()
    {
        $group       = $this->container->group('foo');
        $group->name = 'Foo';
        $group->info = 'Foo bar baz bat';

        $this->assertSame('Foo', $group->name);
        $this->assertSame('Foo bar baz bat', $group->info);

        $group = $this->container->group('foo', function ($group) {
            $group->name = 'Foo';
            $group->info = 'Foo bar baz bat';
        });

        $this->assertSame('Foo', $group->name);
        $this->assertSame('Foo bar baz bat', $group->info);
    }

    /** @test */
    public function a_container_can_have_a_single_group()
    {
        $this->container->group('foo');

        $this->assertCount(1, $this->container);

        $this->assertFalse($this->container->isEmpty());
        $this->assertTrue($this->container->hasGroups());
    }

    /** @test */
    public function a_container_can_have_multiple_groups()
    {
        $this->container->group('foo');
        $this->container->group('bar');
        $this->container->group('baz');

        $this->assertCount(3, $this->container);

        $this->assertFalse($this->container->isEmpty());
        $this->assertTrue($this->container->hasGroups());
    }

    /** @test */
    public function it_can_check_if_a_group_exists()
    {
        $this->container->group('foo');
        $this->container->group('bar');
        $this->container->group('baz');

        $this->assertTrue($this->container->has('bar'));
    }

    /** @test */
    public function it_can_return_an_existing_group_instance()
    {
        $this->container->group('foo');
        $this->container->group('bar');
        $this->container->group('baz');

        $this->assertSame('foo', $this->container->group('foo')->id);
    }

    /** @test */
    public function a_group_can_be_removed()
    {
        $this->container->group('foo');
        $this->container->group('bar');
        $this->container->group('baz');

        $this->assertCount(3, $this->container);

        $this->assertTrue($this->container->hasGroups());

        $this->assertSame('foo', $this->container->first()->id);
        $this->assertSame('baz', $this->container->last()->id);

        $this->container->pull('baz');

        $this->assertCount(2, $this->container);

        $this->assertTrue($this->container->hasGroups());

        $this->assertSame('foo', $this->container->first()->id);
        $this->assertSame('bar', $this->container->last()->id);
    }

    /** @test */
    public function an_existing_group_attributes_can_be_updated()
    {
        $this->container->group('foo', function ($group) {
            $group->name = 'Foo';
        });

        $this->assertSame('Foo', $this->container->group('foo')->name);

        $group       = $this->container->group('foo');
        $group->name = 'Fooo';
        $this->assertSame('Fooo', $this->container->group('foo')->name);

        $group = $this->container->group('foo', function ($group) {
            $group->name = 'Foooo';
        });

        $this->assertSame('Foooo', $this->container->group('foo')->name);
    }
}
