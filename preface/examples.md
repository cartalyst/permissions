### Examples

In this example we'll be covering all the 3 sections of the Permissions package, you can read about them on their appropriate sections.

```php
use Cartalyst\Permissions\Container;

$container = new Container('main', function ($container) {
    // Assign some attributes
    $container->name = 'Main';
    $container->description = 'Main Container description.';

    // Create a new Group
    $container->group('main-group', function ($group) {
        // Assign some attributes
        $group->name = 'Main Group';
        $group->description = 'Main Group description.';

        // Create a new Permission
        $group->permission('foo', function ($permission) {
            $permission->name = 'Foo Permission';

            // Pass the controller methods as an array
            $permission->controller('App\Controllers\Foo', [ 'bar', 'baz' ]);
        });

        // Create a new Permission
        $group->permission('base', function ($permission) {
            $permission->name = 'Base Permission';

            // Pass the controller methods as a string
            $permission->controller('App\Controllers\Base', 'index, view, update');
        });
    });

    // Create another Group
    $container->group('other-group', function ($group) {
        // Assign some attributes
        $group->name = 'Another Group';
        $group->description = 'Another Group description.';
    });
});
```
