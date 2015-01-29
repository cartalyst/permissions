### Permission

The Permission is the final step and works the same way as the Container and Group.

If you want to protect a controller, you can use the `controller()` method when defining the permission.

Here's how you do it:

###### Parameters

Key       | Required | Type    | Default | Description
--------- | -------- | ------- | ------- | -------------------------------------
$id       | true     | string  | void    | The permission identifier.
$callback | false    | Closure | null    | A Closure used to assign attributes.

###### Usage

```
$permission = $group->permission('main');
$permission->name = 'Main';
$permission->description = 'My Foo@bar Controller Permission';

// Protect the given controller and the given methods
$permission->controller('App\Controllers\Foo', [ 'bar', 'baz' ]);
```

```
$permission = $group->permission('main', function ($p) {
	$p->name = 'Main';
	$p->description = 'My Foo@bar Controller Permission';

	// Protect the given controller and the given methods
	$p->controller('App\Controllers\Foo', [ 'bar', 'baz' ]);
});
```
