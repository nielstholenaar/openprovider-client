<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class Extension extends BaseModel {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $primaryKey = 'name';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	 => ['method' => 'POST'],
		'show'	 => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'  => ['path' => 'searchExtensionRequest'],
		'show'   => ['path' => 'retrieveExtensionRequest'],
	];

}
