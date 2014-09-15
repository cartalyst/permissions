<?php namespace Cartalyst\Permissions;

use Closure;
use Cartalyst\Support\Collection;

class Group extends Collection {

	public function permission($id, Closure $callback = null)
	{
		if ( ! $permission = $this->find($id))
		{
			$this->put($id, $permission = new Permission($id));
		}

		$permission->executeCallback($callback);

		return $permission;
	}

}
