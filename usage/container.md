### Container

The first step is to initialize a new Container.

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
            <td>The Container identifier.</td>
        </tr>
        <tr>
            <td>$callback</td>
            <td>false</td>
            <td>Closure</td>
            <td>null</td>
            <td>A Closure used to assign attributes and/or to set a new Group.</td>
        </tr>
    </tbody>
</table>

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

Assigning Groups to a Container is very straightforward and there's two ways of achieving the same goal.

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

##### Check if the Container has groups

```
if ($container->hasGroups()) {
    echo 'Container has groups';
} else {
    echo 'Container has no groups.';
}
```

##### Get all groups

```
$groups = $container->all();
```

##### Get a specific group

```
$group = $container->find('foo');
```
