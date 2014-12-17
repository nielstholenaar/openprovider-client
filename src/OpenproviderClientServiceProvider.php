<?php namespace Nielstholenaar\OpenproviderClient;

use Illuminate\Support\ServiceProvider;

class OpenproviderClientServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * {@inheritDoc}
	 */
	public function boot()
	{
		$this->bindOpenproviderConnection();
		$this->bindOpenproviderConnector();

		$this->package('pcextreme/openprovider-client', 'openprovider-client', __DIR__ . '/..');
	}

	/**
	 * Bind the Openprovider connector
	 */
	public function bindOpenproviderConnector()
	{
		$this->app->bind(
			'elicit.connector.openprovider',
			'Nielstholenaar\OpenproviderClient\Connector\OpenproviderConnector'
		);
	}

	/**
	 * Bind the Openprovider connection
	 */
	public function bindOpenproviderConnection()
	{
		$this->app->bind(
			'elicit.connection.openprovider',
			'Nielstholenaar\OpenproviderClient\Connection\OpenproviderConnection'
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function register() {}

}
