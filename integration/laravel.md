### Laravel

The Permissions package has optional support for Laravel and it comes bundled with a Service Provider for easy integration.

After installing the package, open your Laravel config file located at `app/config/app.php` and add the following lines.

In the `$providers` array add the following service provider for this package.

	'Cartalyst\Permissions\Laravel\PermissionsServiceProvider',

Now anywhere on your application call `app('cartalyst.permissions')` to have access to the main Permissions Container.
