<?php namespace Nielstholenaar\OpenproviderClient\Connector;

use RuntimeException;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use Kevindierkx\Elicit\Connector\ConnectorInterface;
use Kevindierkx\Elicit\Connector\Connector;

class OpenproviderConnector extends Connector implements ConnectorInterface {

	/**
	 * {@inheritdoc}
	 */
	public function connect(array $config)
	{
		return $this->createConnection($config);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function prepareRequestUrl(array $query)
	{
		return $this->host;
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
