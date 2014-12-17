<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class DnsZone extends BaseModel {

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
		'index'   => ['path' => 'searchZoneDnsRequest'],
		'show'    => ['path' => 'retrieveZoneDnsRequest'],
		'store'	  => ['path' => 'createZoneDnsRequest'],
		'update'  => ['path' => 'modifyZoneDnsRequest'],
		'destroy' => ['path' => 'deleteZoneDnsRequest'],
	];

}
