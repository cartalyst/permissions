<?php namespace Cartalyst\Permissions;

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
