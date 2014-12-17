<?php namespace Nielstholenaar\OpenproviderClient\Model;

use Kevindierkx\Elicit\Elicit\Model;

class BaseModel extends Model {

	/**
	 * {@inheritDoc}
	 */
	public function __call($method, $parameters)
	{
		$query = $this->newQuery();

		if ( in_array($method, array_keys($this->paths)) ) {
			return $query->from($this->getPath($method));
		}

		return call_user_func_array(array($query, $method), $parameters);
	}

	/**
	 * {@inheritDoc}
	 */
	public static function __callStatic($method, $parameters)
	{
		$instance = new static;

		if ( in_array($method, array_keys($instance->paths)) ) {
			return $instance->newQuery()->from($instance->getPath($method));
		}

		return call_user_func_array(array($instance, $method), $parameters);
	}

}
