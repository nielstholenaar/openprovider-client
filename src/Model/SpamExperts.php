<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Nielstholenaar\OpenproviderClient\Model\BaseModel;

class SpamExperts extends BaseModel {

	/**
	 * {@inheritDoc}
	 */
	protected $connection = 'openprovider';


	/**
	 * {@inheritDoc}
	 */
	protected $defaults = [
		'index'	  => ['method' => 'POST'],
		'store'   => ['method' => 'POST'],
		'update'  => ['method' => 'POST'],
		'destroy' => ['method' => 'POST'],
		'generateSeLoginUrl' => ['method' => 'POST'],
	];

	/**
	 * {@inheritDoc}
	 */
	protected $paths = [
		'index'   => ['path'  => 'searchCustomerRequest'],
		'store'   => ['path'  => 'createDomainSeRequest'],
		'update'  => ['path'  => 'modifyDomainSeRequest'],
		'destroy' => ['path'  => 'deleteDomainSeRequest'],
		'generateSeLoginUrl' => ['path'  => 'generateSeLoginUrlRequest'],
	];

}
