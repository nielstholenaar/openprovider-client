<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class NameserverGroup extends BaseModel {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $primaryKey = 'nsGroup';

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
		'index'   => ['path' => 'searchNsGroupRequest'],
		'show'    => ['path' => 'retrieveNsGroupRequest'],
		'store'	  => ['path' => 'createNsGroupRequest'],
		'update'  => ['path' => 'modifyNsGroupRequest'],
		'destroy' => ['path' => 'deleteNsGroupRequest']
	];

}
