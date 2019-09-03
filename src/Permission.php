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

namespace Cartalyst\Permissions;

class Permission extends Collection
{
    /**
     * Sets the controller and the methods for this permission.
     *
     * @param string       $name
     * @param array|string $methods
     *
     * @return void
     */
    public function controller(string $name, $methods = null): self
    {
        $this->controller = $name;

        if (is_string($methods)) {
            $methods = array_map('trim', explode(',', $methods));
        }

        $this->methods = (array) $methods;

        return $this;
    }
}
