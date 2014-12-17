<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class DnsTemplate extends BaseModel {

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
		'destroy' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'   => ['path' => 'searchTemplateDnsRequest'],
		'show'    => ['path' => 'retrieveTemplateDnsRequest'],
		'store'	  => ['path' => 'createTemplateDnsRequest'],
		'destroy' => ['path' => 'deleteTemplateDnsRequest']
	];

}
