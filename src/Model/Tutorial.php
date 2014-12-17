<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class Tutorial extends Model {

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
