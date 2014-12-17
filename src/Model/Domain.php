<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class Domain extends BaseModel {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';

	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	 => ['method' => 'POST'],
		'show'	 => ['method' => 'POST'],
		'store'  => ['method' => 'POST'],
		'check'  => ['method' => 'POST'],
		'trade'  => ['method' => 'POST'],
		'update' => ['method' => 'POST'],
		'renew'  => ['method' => 'POST'],
		'destroy'  => ['method' => 'POST'],
		'transfer' => ['method' => 'POST'],
		'restore'  => ['method' => 'POST'],
		'approveTransfer' => ['method' => 'POST'],
		'requestAuthCode' => ['method' => 'POST'],
		'resetAuthCode'   => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'  => ['path' => 'searchDomainRequest'],
		'show'   => ['path' => 'retrieveDomainRequest'],
		'store'  => ['path' => 'createDomainRequest'],
		'check'	 => ['path' => 'checkDomainRequest'],
		'trade'	 => ['path'	=> 'tradeDomainRequest'],
		'update' => ['path' => 'modifyDomainRequest'],
		'renew'  => ['path' => 'renewDomainRequest'],
		'destroy'  => ['path' => 'deleteDomainRequest'],
		'transfer' => ['path' => 'transferDomainRequest'],
		'restore'  => ['path' => 'restoreDomainRequest'],
		'approveTransfer' => ['path' => 'approveTransferDomainRequest'],
		'requestAuthCode' => ['path' => 'requestAuthCodeDomainRequest'],
		'resetAuthCode'   => ['path' =>	'resetAuthCodeDomainRequest'],
	];

}
