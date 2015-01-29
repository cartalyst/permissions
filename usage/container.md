### Container

The first step is to initialize a new Container.

Here's how you do it:

###### Parameters

Key       | Required | Type    | Default | Description
--------- | -------- | ------- | ------- | -------------------------------------
$id       | true     | string  | void    | The container identifier.
$callback | false    | Closure | null    | A Closure used to assign attributes and/or to set a new Group.

###### Usage

```
use Cartalyst\Permissions\Container;

$container = new Container('main');
$container->name = 'Main';
$container->description = 'Main Container description.';
```

```
use Cartalyst\Permissions\Container;

$container = new Container('main', function ($c) {
	$c->name = 'Main';
	$c->description = 'Main Container description.';
});
```

##### Assign Groups

Assigning Groups to a Container is very straightforward and there's 2 ways of achieving the same goal.

###### Method 1

```php
use Cartalyst\Permissions\Container;

$container = new Container('main', function ($c) {
	$c->name = 'Main';
	$c->description = 'Main Container description.';

	$c->group('main-group', function ($g) {
		$g->name = 'Main Group';
		$g->description = 'Main Container Group';
	});
});
```

###### Method 2

Please refer to the [Group section](#group) and follow the instructions.
