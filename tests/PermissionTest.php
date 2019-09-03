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
 * @version    1.0.3
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2017, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Permissions\Tests;

use PHPUnit\Framework\TestCase;
use Cartalyst\Permissions\Permission;

class PermissionTest extends TestCase
{
    /**
     * The permissions permission instance.
     *
     * @var \Cartalyst\Permissions\Permission
     */
    protected $permission;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->permission = new Permission('main');
    }

    /** @test */
    public function a_permission_can_be_instantiated()
    {
        $permission = new Permission('main');

        $this->assertInstanceOf(Permission::class, $permission);
    }

    /** @test */
    public function a_permission_can_be_instantiated_and_have_attributes()
    {
        $permission       = new Permission('foo');
        $permission->name = 'Foo';

        $this->assertSame('foo', $permission->id);
        $this->assertSame('Foo', $permission->name);

        $permission = new Permission('foo', function ($permission) {
            $permission->name = 'Foo';
        });

        $this->assertSame('foo', $permission->id);
        $this->assertSame('Foo', $permission->name);
    }

    /** @test */
    public function a_permission_can_have_a_controller_with_methods()
    {
        $permission = new Permission('foo');
        $permission->controller('FooController', 'foo, bar');

        $this->assertSame('FooController', $permission->controller);
        $this->assertSame(['foo', 'bar'], $permission->methods);

        $permission = new Permission('foo');
        $permission->controller('FooController', 'foo,bar');

        $this->assertSame('FooController', $permission->controller);
        $this->assertSame(['foo', 'bar'], $permission->methods);

        $permission = new Permission('foo');
        $permission->controller('BarController', ['foo', 'bar', 'baz']);

        $this->assertSame('BarController', $permission->controller);
        $this->assertSame(['foo', 'bar', 'baz'], $permission->methods);
    }

    /** @test */
    public function a_permission_can_have_a_controller_without_methods()
    {
        $permission = new Permission('foo');
        $permission->controller('FooController');

        $this->assertSame('FooController', $permission->controller);
        $this->assertSame([], $permission->methods);

        $permission = new Permission('foo');
        $permission->controller('FooController');

        $this->assertSame('FooController', $permission->controller);
        $this->assertSame([], $permission->methods);

        $permission = new Permission('foo');
        $permission->controller('BarController');

        $this->assertSame('BarController', $permission->controller);
        $this->assertSame([], $permission->methods);
    }
}
