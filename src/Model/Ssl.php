<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class Ssl extends BaseModel {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	=> ['method' => 'POST'],
		'show'	=> ['method' => 'POST'],
		'store' => ['method' => 'POST'],

		'destroy'   => ['method' => 'POST'],
		'reissue'   => ['method' => 'POST'],
		'decodeCsr' => ['method' => 'POST'],

		'productIndex'        => ['method' => 'POST'],
		'retrieveProduct'     => ['method' => 'POST'],
		'resendApproverEmail' => ['method' => 'POST'],

		'retrieveApproverEmailList'  => ['method' => 'POST'],
		'changeApproverEmailAddress' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index' => ['path' => 'searchOrderSslCertRequest'],
		'show'  => ['path' => 'retrieveOrderSslCertRequest'],
		'store' => ['path' => 'createSslCertRequest'],

		'destroy'   => ['path' => 'cancelSslCertRequest'],
		'reissue'   => ['path' => 'reissueSslCertRequest'],
		'decodeCsr' => ['path' => 'decodeCsrSslCertRequest'],

		'productIndex'        => ['path' => 'searchProductSslCertRequest'],
		'retrieveProduct'     => ['path' => 'retrieveProductSslCertRequest'],
		'resendApproverEmail' => ['path' => 'resendApproverEmailSslCertRequest'],

		'retrieveApproverEmailList'  => ['path' => 'retrieveApproverEmailListSslCertRequest'],
		'changeApproverEmailAddress' => ['path' => 'changeApproverEmailAddressSslCertRequest'],
	];

}
