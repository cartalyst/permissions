<?php namespace Cartalyst\Permissions;

use Closure;
use Cartalyst\Support\Collection;

class Container extends Collection {

	public function group($id, Closure $callback = null)
	{
		if ( ! $group = $this->find($id))
		{
			$this->put($id, $group = new Group($id));
		}

		$group->executeCallback($callback);

		return $group;
	}

}
