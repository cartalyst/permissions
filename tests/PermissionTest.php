<?php namespace Cartalyst\Permissions\Tests;

use PHPUnit_Framework_TestCase;
use Cartalyst\Permissions\Permission;

class PermissionTest extends PHPUnit_Framework_TestCase {

	/** @test */
	public function a_permission_can_be_instantiated()
	{
		$permission = new Permission('main');

		$this->assertInstanceOf('Cartalyst\Permissions\Permission', $permission);
	}


}
