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

class Container extends Collection {

	/**
	 * Returns a group instance.
	 *
	 * @param  mixed  $id
	 * @param  \Closure  $callback
	 * @return \Illuminate\Support\Collection
	 */
	public function group($id, Closure $callback = null)
	{
		if ( ! $group = $this->find($id))
		{
			$this->put($id, $group = new Group($id));
		}

		$group->executeCallback($callback);

		return $group;
	}

	/**
	 * Checks if the container has any groups registered.
	 *
	 * @return bool
	 */
	public function hasGroups()
	{
		return (bool) $this->count();
	}

}
