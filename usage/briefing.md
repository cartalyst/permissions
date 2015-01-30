### Briefing

Here we'll explain the 3 aspects of the Permissions package.

##### Container

The Container is the most important aspect of the Permissions package.

It needs to be the first thing you'll instantiate and it will be responsible for holding all of your permissions Groups and the corresponding permissions.

##### Group

The Group is the second thing to be instantiated and it's responsible for holding the permissions itself.

##### Permission

The Permission is the last thing to be instantiated and it can either hold the controller and the corresponding controller methods to be protected or just some minor attributes.
