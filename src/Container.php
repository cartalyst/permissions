<?php namespace Cartalyst\Permissions;

use Closure;
use Cartalyst\Support\Collection;

class Container extends Collection {

	/**
	 * Returns a group instance
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
