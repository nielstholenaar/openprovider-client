<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class Extension extends Model {

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
