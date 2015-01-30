### Group

Now that we have a Container, we need to create a group, or multiple groups which will hold our permissions.

Here's how you do it:

###### Parameters

<table>
    <thead>
        <th>Key</th>
        <th>Required</th>
        <th>Type</th>
        <th>Default</th>
        <th>Description</th>
    </thead>
    <tbody>
        <tr>
            <td>$id</td>
            <td>true</td>
            <td>string</td>
            <td>void</td>
            <td>The Group identifier.</td>
        </tr>
        <tr>
            <td>$callback</td>
            <td>false</td>
            <td>Closure</td>
            <td>null</td>
            <td>A Closure used to assign attributes and/or to set a new Permission.</td>
        </tr>
    </tbody>
</table>

###### Usage

```
$group = $container->group('main-group');
$group->name = 'Main Group';
$group->description = 'Main Container Group';
```

```
$group = $container->group('main-group', function ($group) {
    $group->name = 'Main Group';
    $group->description = 'Main Container Group';
});
```

##### Assign Permissions

Assigning Permissions to a Group is very straightforward and there's two ways of achieving the same goal.

###### Method 1

```php
$group = $container->group('main-group', function ($group) {
    $group->name = 'Main Group';
    $group->description = 'Main Container Group';

    $group->permission('main', function ($permission) {
        $permission->name = 'Main';
        $permission->description = 'My Foo@bar Controller Permission';

        $permission->controller('App\Controllers\Foo', [ 'bar', 'baz' ]);
    });
});
```

###### Method 2

Please refer to the [Permission section](#permission) and follow the instructions.

##### Check if the Group has permissions

```
if ($group->hasPermissions()) {
    echo 'Group has permissions';
} else {
    echo 'Group has no permissions.';
}
```

##### Get all permissions

```
$permissions = $group->all();
```

##### Get a specific permission

```
$permission = $group->find('foo');
```
