<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class Ssl extends Model {

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
		'reissue' => ['method' => 'POST'],
		'productIndex'    => ['method' => 'POST'],
		'retrieveProduct' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'   => ['path' => 'searchOrderSslCertRequest'],
		'show'    => ['path' => 'retrieveOrderSslCertRequest'],
		'store'	  => ['path' => 'createSslCertRequest'],
		'destroy' => ['path' => 'cancelSslCertRequest'],
		'reissue' => ['path' => 'reissueSslCertRequest'],
		'productIndex'    => ['path' => 'searchProductSslCertRequest'],
		'retrieveProduct' => ['path' => 'retrieveProductSslCertRequest'],
	];

}
