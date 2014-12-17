openprovider-client
===================

A simple wrapper around the Openprovider API


### Credits

- [Niels Tholenaar](https://github.com/nielstholenaar)

### Usage

*This package is currently only compatible with Laravel*

Register the serviceprovider by adding the following lines to the `app/config/app.php` file.

`'Kevindierkx\Elicit\Provider\LegacyElicitServiceProvider',
'Nielstholenaar\OpenproviderClient\OpenproviderClientServiceProvider',
`

Create an configuration file under `app/config/packages/kevindierkx/elicit/` named `config.php` and add the following content:

```
<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Default API Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the API connections below you wish
	| to use as your default connection. Of course you may use many
	| connections at once using the Elicit library.
	|
	*/

	'default' => 'openprovider',

	/*
	|--------------------------------------------------------------------------
	| API Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the API connections setup for your application.
	| Elicit has support for different connection drivers and authentication
	| drivers defined with the driver and the auth key in your connection.
	|
	| The available connection drivers are defined by the Connections
	| classes. Connection drivers handle request to and from the API.
	| The available authenticaiton drivers are defined by the Connectors
	| classes. Authentication drivers handle the API authentication.
	|
	*/

	'connections' => [

		'openprovider' => [
			'driver' => 'openprovider',
			'host'   => 'https://api.openprovider.eu',
			'auth'       => 'openprovider',
			'identifier' => '',
			'secret'     => '',
		],

	],

];
```


### License

The MIT License (MIT). Please see [License File](https://github.com/nielstholenaar/openprovider-client/blob/master/LICENSE) for more information.
