<?php namespace Nielstholenaar\OpenproviderClient\Connector;

use DOMDocument;
use SimpleXMLElement;
use DomElement;
use RuntimeException;
use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Message\Response;
use Kevindierkx\Elicit\Connector\ConnectorInterface;
use Kevindierkx\Elicit\Connector\Connector;

class OpenproviderConnector extends Connector implements ConnectorInterface {

	/**
	 * {@inheritdoc}
	 */
	public function connect(array $config)
	{
		$connection = $this->createConnection($config);

		return $connection;
	}

	/**
	 * {@inheritdoc}
	 */
	public function prepare(array $query)
	{
		parent::prepare($query);

		// Here we add the remaining wheres in the body.
		// The body must be json encoded and sent with the request
		// using the application/json content type header.
		$this->request->setBody(Stream::factory($this->prepareBody($query)));

		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function prepareRequestUrl(array $query)
	{
		return $this->host;
	}

	/**
	 * Parse the XML for the post body.
	 *
	 * @param  array  $query
	 * @return string
	 */
	protected function prepareBody(array $query)
	{
		$wheres = array_get($query, 'wheres');
		$rootElement = new SimpleXMLElement("<?xml version=\"1.0\"?><openXML></openXML>");

		$this->array2xml($wheres, $rootElement);

		//dd($rootElement->asXML());

		return $rootElement->asXML();
	}

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
	 * {@inheritdoc}
	 */
	protected function parseResponse(Response $response)
	{
		try {
			return parent::parseResponse($response);
		} catch (RuntimeException $ex) {
			$contentType = explode(';', $response->getHeader('content-type'))[0];
			switch ($contentType) {

				case 'text/html':
					return $response->xml();
			}

			throw new RuntimeException("Unsupported returned content-type [$contentType]");
		}
	}

}
