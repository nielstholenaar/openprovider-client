<?php namespace Nielstholenaar\OpenproviderClient\Query\Processor;

use Kevindierkx\Elicit\Query\Processors\Processor;
use Kevindierkx\Elicit\Query\Builder;
use SimpleXMLElement;

class OpenproviderProcessor extends Processor {

	/**
	 * {@inheritdoc}
	 */
	public function processRequest(Builder $query, $results)
	{

		// Remove all SimpleXML traces
		$results = json_decode( json_encode( (array) $results ) );

		if ( isset($results->reply->data) ) {
			$results = $results->reply->data;
		}

		if ( isset($results->results) ) {
			$results = $results->results;
		}

		if ( isset($results->nameServers) ) {
			$results = $results->nameServers;
		}

		// Openprovider stores there collections
		// within an 'array' element. Each item within this
		// element is stored within the 'item' element
		// When we detect one or more collection we simplify them.
		if (
			 isset($results->array) &&
			 isset($results->array->item)
		) {
			if ( count($results->array->item) <= 1 ) {
				$results = [$results->array->item];
			} else {
				$results = $results->array->item;
			}
		}

		if (! is_array($results)) { return [$results]; }
		return $results;
	}

}
