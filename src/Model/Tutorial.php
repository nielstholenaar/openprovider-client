<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class Tutorial extends BaseModel {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	=> ['method' => 'POST'],
		'show'  => ['method' => 'POST'],
		'store' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index' => ['path'  => 'searchTutorialRequest'],
		'show'  => ['path'  => 'retrieveTutorialRequest'],
		'store' => ['path'  => 'orderTutorialRequest'],
	];

}
