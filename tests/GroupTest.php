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
use Cartalyst\Permissions\Group;

class GroupTest extends TestCase
{
    /**
     * The permissions group instance.
     *
     * @var \Cartalyst\Permissions\Group
     */
    protected $group;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->group = new Group('main');
    }

    /** @test */
    public function a_group_can_be_instantiated()
    {
        $group = new Group('main');

        $this->assertInstanceOf(Group::class, $group);
    }

    /** @test */
    public function a_group_can_be_instantiated_and_have_attributes()
    {
        $group       = new Group('foo');
        $group->name = 'Foo';

        $this->assertSame('foo', $group->id);
        $this->assertSame('Foo', $group->name);

        $group = new Group('foo', function ($group) {
            $group->name = 'Foo';
        });

        $this->assertSame('foo', $group->id);
        $this->assertSame('Foo', $group->name);
    }

    /** @test */
    public function a_group_permission_can_be_instantiated_and_have_attributes()
    {
        $permission       = $this->group->permission('foo');
        $permission->name = 'Foo';
        $permission->info = 'Foo bar baz bat';

        $this->assertSame('Foo', $permission->name);
        $this->assertSame('Foo bar baz bat', $permission->info);

        $permission = $this->group->permission('foo', function ($permission) {
            $permission->name = 'Foo';
            $permission->info = 'Foo bar baz bat';
        });

        $this->assertSame('Foo', $permission->name);
        $this->assertSame('Foo bar baz bat', $permission->info);
    }

    /** @test */
    public function a_group_can_have_a_single_permission()
    {
        $this->group->permission('foo');

        $this->assertCount(1, $this->group);

        $this->assertFalse($this->group->isEmpty());

        $this->assertTrue($this->group->hasPermissions());
    }

    /** @test */
    public function a_group_can_have_multiple_permissions()
    {
        $this->group->permission('foo');
        $this->group->permission('bar');
        $this->group->permission('baz');

        $this->assertCount(3, $this->group);

        $this->assertFalse($this->group->isEmpty());
        $this->assertTrue($this->group->hasPermissions());
    }

    /** @test */
    public function it_can_check_if_a_permission_exists()
    {
        $this->group->permission('foo');
        $this->group->permission('bar');
        $this->group->permission('baz');

        $this->assertTrue($this->group->has('bar'));
    }

    /** @test */
    public function it_can_return_an_existing_permission_instance()
    {
        $this->group->permission('foo');
        $this->group->permission('bar');
        $this->group->permission('baz');

        $this->assertSame('foo', $this->group->permission('foo')->id);
    }

    /** @test */
    public function a_group_can_be_removed()
    {
        $this->group->permission('foo');
        $this->group->permission('bar');
        $this->group->permission('baz');

        $this->assertCount(3, $this->group);

        $this->assertTrue($this->group->hasPermissions());

        $this->assertSame('foo', $this->group->first()->id);
        $this->assertSame('baz', $this->group->last()->id);

        $this->group->pull('baz');

        $this->assertCount(2, $this->group);

        $this->assertTrue($this->group->hasPermissions());

        $this->assertSame('foo', $this->group->first()->id);
        $this->assertSame('bar', $this->group->last()->id);
    }

    /** @test */
    public function an_existing_permission_attributes_can_be_updated()
    {
        $this->group->permission('foo', function ($group) {
            $group->name = 'Foo';
        });

        $this->assertSame('Foo', $this->group->permission('foo')->name);

        $group       = $this->group->permission('foo');
        $group->name = 'Fooo';

        $this->assertSame('Fooo', $this->group->permission('foo')->name);

        $group = $this->group->permission('foo', function ($group) {
            $group->name = 'Foooo';
        });

        $this->assertSame('Foooo', $this->group->permission('foo')->name);
    }
}
