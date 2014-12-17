<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class License extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	  => ['method' => 'POST'],
		'show'    => ['method' => 'POST'],
		'store'   => ['method' => 'POST'],
		'update'  => ['method' => 'POST'],
		'destroy' => ['method' => 'POST'],

		'productIndex'       => ['method' => 'POST'],
		'retrieveProduct'    => ['method' => 'POST'],
		'upgradeLicense'     => ['method' => 'POST'],
		'retrieveKeyLicense' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'   => ['path'  => 'searchLicenseRequest'],
		'show'    => ['path'  => 'retrieveLicenseRequest'],
		'store'   => ['path'  => 'createLicenseRequest'],
		'update'  => ['path'  => 'editLicenseRequest'],
		'destroy' => ['path'  => 'deleteLicenseRequest'],

		'productIndex'       => ['path' => 'searchProductLicenseRequest'],
		'retrieveProduct'    => ['path' => 'retrieveProductLicenseRequest'],
		'upgradeLicense'     => ['path' => 'upgradeLicenseRequest'],
		'retrieveKeyLicense' => ['path' => 'retrieveKeyLicenseRequest'],
	];

}
