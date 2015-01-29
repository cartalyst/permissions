### Examples

In this example we'll be covering all the 3 sections of the Permissions package, you can read about them on their appropriate sections.

```php
use Cartalyst\Permissions\Container;

$container = new Container('main', function($c) {
	// Assign some attributes
	$c->name = 'Main';
	$c->description = 'Main Container description.';

	// Create a new Group
	$c->group('main-group', function($g) {
		// Assign some attributes
		$g->name = 'Main Group';
		$g->description = 'Main Group description.';

		// Create a new Permission
		$g->permission('App\Controllers\Foo', [ 'bar', 'baz' ]);

		// Create a new Permission
		$g->permission('App\Controllers\Base', [ 'index', 'view', 'update' ]);
	});
});
```
