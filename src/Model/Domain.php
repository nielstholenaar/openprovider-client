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
		'show'   => ['path' => 'searchDomainRequest'],
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

	/**
	 * Find a model by it's domain name
	 *
	 * @param  mixed  $id
	 * @return \NielsTholenaar\OpenProviderClient\Model\Domain|static|null
	 */
	public static function find($domainName)
	{
		$instance = new static;

		// Explode domain and extension
		$domainParts = explode('.', $domainName, 2);
		if ( count($domainParts) < 2 ) return null;

		// Set the path
		$path = $instance->getPath('show');
		$query = $instance->from($path);

		// Set required parameters
		$query = $query->postField('domainNamePattern', $domainParts[0]);
		$query = $query->postField('limit', 1);

		return $query->first();
	}

	/**
     * Retrieve the availability of the domain name
     * The domain is free when the boolean value is equal to true
     *
     * @return boolean|null
     */
    public function getRegisteredStatus() {
    	
    	$domain = $this->getAttribute('domain');
    	if ( is_null($domain) ) return;

    	// Set the path
    	$path = $this->getPath('check');
    	$query = $this->from($path);

    	// The openprovider api requires an array with atleast one domain item.
    	// Each domain item should contain 
    	$domainItem = [(array) $this->domain];

    	$check = $query->postField('domains', $domainItem)->get()->first();

    	// Return the availability of the domain
    	if ( isset($check->status) ) return ($check->status != 'active');
    	else return null;
    }

}
