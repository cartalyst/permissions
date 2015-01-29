### Group

Now that we have a Container, we need to create a group, or multiple groups which will hold our permissions.

Here's how you do it:

###### Parameters

Key       | Required | Type    | Default | Description
--------- | -------- | ------- | ------- | -------------------------------------
$id       | true     | string  | void    | The group identifier.
$callback | false    | Closure | null    | A Closure used to assign attributes and/or to set a new Group.

###### Usage

```
$group = $container->group('main-group');
$group->name = 'Main Group';
$group->description = 'Main Container Group';
```

```
$group = $container->group('main-group', function ($g) {
	$g->name = 'Main Group';
	$g->description = 'Main Container Group';
});
```

##### Assign Permissions

Assigning Permissions to a Group is very straightforward and there's 2 ways of achieving the same goal.

###### Method 1

```php
$group = $container->group('main-group', function ($g) {
	$g->name = 'Main Group';
	$g->description = 'Main Container Group';

	$group->permission('main', function ($p) {
		$p->name = 'Main';
		$p->description = 'My Foo@bar Controller Permission';
		$p->controller('App\Controllers\Foo', ['bar', 'baz']);
	});
});
```

###### Method 2

Please refer to the [Permission section](#permission) and follow the instructions.
