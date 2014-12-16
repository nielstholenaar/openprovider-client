<?php namespace Nielstholenaar\OpenproviderClient\Query\Grammar;

use Kevindierkx\Elicit\Query\Grammars\Grammar;
use Kevindierkx\Elicit\Query\Builder;

use DOMDocument;
use SimpleXMLElement;
use DomElement;

class OpenproviderGrammar extends Grammar {

	/**
	 * @var array
	 */
	protected $credentials = array();

	/**
	 * Compile credentials, returns the same result as the
	 * compile components method.
	 *
	 * @return array
	 */
	protected function compileCredentials()
	{
		$credentials = [];

		foreach ($this->credentials as $key => $value) {
			$credentials[$key] = $this->encodeCredentials($value);
		}

		return ['credentials' => $credentials];
	}

	/**
	 * {@inheritDoc}
	 */
	protected function compileBody(Builder $query)
	{

		$credentials = $this->compileCredentials();
		$path        = $query->from['path'];
		$body        = parent::compileBody($query);

		$compiled = array_merge($credentials, [$path => $body]);


		// Build the XML
		$rootElement = new SimpleXMLElement('<?xml version=\'1.0\'?><openXML></openXML>');

		$this->array2xml($compiled, $rootElement);

		return $rootElement->asXML();
	}

	/**
	 * [array2xml description]
	 * @param  [type] $data     [description]
	 * @param  [type] &$element [description]
	 * @return [type]           [description]
	 */
	protected function array2xml($data, &$element) {

		foreach($data as $key => $value) {
			if ( is_array($value) ) {

				if ( ! is_numeric($key) ) {
					$subnode = $element->addChild("$key");
					$this->array2xml($value, $subnode);
				} else {
					$subnode = $element->addChild('item');
					$this->array2xml($value, $subnode);
				}
			}
			else {
				$element->addChild("$key",htmlspecialchars("$value"));
			}
		}
	}

	/**
	 * Encode credentials for XML document.
	 *
	 * @param  string  $value
	 * @return string
	 */
	protected function encodeCredentials($value)
    {
        return htmlentities($value, null, 'UTF-8');
    }

	/**
	 * Get credentials.
	 *
	 * @return array
	 */
	public function getCredentials()
	{
		return $this->credentials;
	}

	/**
	 * Set credentials.
	 *
	 * @param string  $username
	 * @param string  $password
	 */
	public function setCredentials($username, $password)
	{
		$this->credentials = [
			'username' => $username,
			'password' => $password,
		];
	}

}
