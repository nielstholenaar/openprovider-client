<?php namespace Nielstholenaar\OpenproviderClient\Query\Processor;

use Kevindierkx\Elicit\Query\Builder;
use Kevindierkx\Elicit\Query\Processors\Processor;

class OpenProviderProcessor extends Processor {

	/**
	 * Process the results of an API request.
	 *
	 * @param  \Kevindierkx\Elicit\Query\Builder  $query
	 * @param  array  $results
	 * @return array
	 */
	protected function processRequest(Builder $query, $results)
	{
		// Here we remove any SimpleXmlElement traces, by casting the object to array
		// and json_encode / decode the result
		$results = json_decode(json_encode((array) $results));

		if ( isset($results->reply) ) $results = $results->reply;

		if ( isset($results->code) && $results->code != 0 ) { return []; }

		// Openprovider wraps his API results in several
		// Results provided by the Openprovider API may contains several unneeded elements,
		// which makes the dataset more complex. The following if statements will
		// try to remove the not required elements
		if (isset($results->data)) $results = $results->data;
		if (isset($results->total) && $results->total == 0) return [];
		if (isset($results->results)) $results = $results->results;
		if (isset($results->array)) $results = $results->array;
		if (isset($results->item)) $results = (array) $results->item;

		// Here we validate the results being returned to be associative.
		// When they are not we wrap them in an array making it easier for
		// elicit to them parse as a model.
		if (array_keys($results) !== range(0, count($results) - 1)) return [$results];

		// Here we return the results directly, assuming the items in
		// the array are a collection.
		return $results;
	}

	/**
	 * Process the results of both an "Index" and "Show" API request
	 *
	 * @param  \Kevindierkx\Elicit\Query\Builder  $query
	 * @param  array  $results
	 * @return array
	 */
	public function processShowRequest(Builder $query, $results)
	{
		return $this->processRequest($query, $results);
	}

	/**
	 * Process the results of an "Create" API request
	 *
	 * @param  \Kevindierkx\Elicit\Query\Builder  $query
	 * @param  array  $results
	 * @return array
	 */
	public function processCreateRequest(Builder $query, $results)
	{
		return $this->processRequest($query, $results);
	}

	/**
	 * Process the result of an "Update" API request
	 *
	 * @param  \Kevindierkx\Elicit\Query\Builder  $query
	 * @param  array  $results
	 * @return array
	 */
	public function processUpdateRequest(Builder $query, $results)
	{
		return $this->processRequest($query, $results);
	}

	/**
	 * Process the result of an "Delete" API request
	 *
	 * @param  \Kevindierkx\Elicit\Query\Builder  $query
	 * @param  array  $results
	 * @return boolean
	 */
	public function processDeleteRequest(Builder $query, $results)
	{
		// We assume that there isn't any response on
		// a successful delete operation (204 No Content)
		return ( count($results) != 0 );
	}

}
