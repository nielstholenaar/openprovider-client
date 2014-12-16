<?php namespace Nielstholenaar\OpenproviderClient\Query\Grammar;

use Kevindierkx\Elicit\Query\Grammars\Grammar;
use Kevindierkx\Elicit\Query\Builder;

class OpenproviderGrammar extends Grammar {

	/**
	 * @var array
	 */
	protected $credentials = array();

	/**
	 * {@inheritdoc}
	 */
	public function compileRequest(Builder $query)
	{
		// @todo small hack for items who did not have any wheres
		// if ( is_null($query->wheres) ) {
		// 	$query->wheres = [];
		// 	array_push($query->wheres, [$query->from['path']]);
		// }

		$compiledComponents = $this->compileComponents($query);

		$credentials = $this->compileCredentials();
		$wheres      = isset($compiledComponents['wheres']) ? $compiledComponents['wheres'] : [];

		$compiledComponents['wheres'] = array_merge($credentials, $wheres);

		return $compiledComponents;
	}

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
	 * {@inheritdoc}
	 */
	protected function compileWheres(Builder $query)
	{
		$path    = $query->from['path'];
		$request = array();

		if ( ! is_null($query->wheres) ) {
			foreach ($query->wheres as $where) {
				if ($this->hasReplacedWhere($where)) continue;

				if ( ! is_array($where['value']) ) {
					$request[$where['column']] = $where['value'];
				} else {

					if ( ! (array_keys($where['value']) !== range(0, count($where['value']) - 1) )) {
						$request[$where['column']] = ['array' => $where['value']];
					} else {
						$request[$where['column']] = $where['value'];
					}

				}
			}

			if (count($request) > 0) {
				return [$path => $request];
			}

		}

		return [$path => []];
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
