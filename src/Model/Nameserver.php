<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class Nameserver extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	  => ['method' => 'POST'],
		'show'	  => ['method' => 'POST'],
		'store'   => ['method' => 'POST'],
		'update'  => ['method' => 'POST'],
		'destroy' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'   => ['path' => 'searchNsRequest'],
		'show'    => ['path' => 'retrieveNsRequest'],
		'store'	  => ['path' => 'createNsRequest'],
		'update'  => ['path' => 'modifyNsRequest'],
		'destroy' => ['path' => 'deleteNsRequest'],
	];

}