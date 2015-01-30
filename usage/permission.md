### Permission

The Permission is the final step and works the same way as the Container and Group.

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
            <td>The Permission identifier.</td>
        </tr>
        <tr>
            <td>$callback</td>
            <td>false</td>
            <td>Closure</td>
            <td>null</td>
            <td>A Closure used to assign attributes.</td>
        </tr>
    </tbody>
</table>

###### Usage

```
$permission = $group->permission('main');
$permission->name = 'Main';
$permission->description = 'My Main Permission';
```

```
$permission = $group->permission('main', function ($permission) {
    $permission->name = 'Main';
    $permission->description = 'My Main Permission';
});
```

##### Define a Permission for a Controller

If you want to protect a controller, you can use the `controller()` method when defining the permission.

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
            <td>$name</td>
            <td>true</td>
            <td>string</td>
            <td>void</td>
            <td>The Permission identifier.</td>
        </tr>
        <tr>
            <td>$methods</td>
            <td>false</td>
            <td>string | array</td>
            <td>null</td>
            <td>The methods of this controller.</td>
        </tr>
    </tbody>
</table>

###### Usage

```
// Pass the controller methods as an array
$permission->controller('App\Controllers\Foo', [ 'bar', 'baz' ]);

// Pass the controller methods as a string
$permission->controller('App\Controllers\Foo', 'bar, baz');
```

```
$permission = $group->permission('main', function ($permission) {
    $permission->name = 'Main';
    $permission->description = 'My Foo Controller Permission';

    // Protect the given controller and the given methods
    $permission->controller('App\Controllers\Foo', [ 'bar', 'baz' ]);
});
```
