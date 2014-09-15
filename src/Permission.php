<?php namespace Cartalyst\Permissions;
/**
 * Part of the Permissions package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package    Permissions
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Closure;
use Cartalyst\Support\Collection;

class Permission extends Collection {

	public function setController($name, $methods = null)
	{
		$this->controller = $name;

		if (is_string($methods))
		{
			$methods = array_map('trim', explode(',', $methods));
		}

		$this->methods = $methods;

		return $this;
	}

}
