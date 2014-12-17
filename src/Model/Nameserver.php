<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class Nameserver extends BaseModel {

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
