<?php namespace Cartalyst\Permissions;

use Closure;
use Cartalyst\Support\Collection;

class Group extends Collection {

	/**
	 * Returns a permission instance
	 *
	 * @param  mixed  $id
	 * @param  \Closure  $callback
	 * @return \Illuminate\Support\Collection
	 */
	public function permission($id, Closure $callback = null)
	{
		if ( ! $permission = $this->find($id))
		{
			$this->put($id, $permission = new Permission($id));
		}

		$permission->executeCallback($callback);

		return $permission;
	}

	/**
	 * Checks if the group has any permissions registered.
	 *
	 * @return bool
	 */
	public function hasPermissions()
	{
		return (bool) $this->count();
	}

}
