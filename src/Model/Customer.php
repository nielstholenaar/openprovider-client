<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class Customer extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $primaryKey = 'handle';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	  => ['method' => 'POST'],
		'show'    => ['method' => 'POST'],
		'store'   => ['method' => 'POST'],
		'update'  => ['method' => 'POST'],
		'destroy' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'   => ['path'  => 'searchCustomerRequest'],
		'show'    => ['path'  => 'retrieveCustomerRequest'],
		'store'   => ['path'  => 'createCustomerRequest'],
		'update'  => ['path'  => 'modifyCustomerRequest'],
		'destroy' => ['path'  => 'deleteCustomerRequest'],
	];

}
