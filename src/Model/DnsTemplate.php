<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class DnsTemplate extends Model {

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
