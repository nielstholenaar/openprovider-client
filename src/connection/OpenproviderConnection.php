<?php namespace Nielstholenaar\OpenproviderClient\Connection;

use Kevindierkx\Elicit\Connection\Connection;
use Nielstholenaar\OpenproviderClient\Query\Grammar\OpenproviderGrammar;
use Nielstholenaar\OpenproviderClient\Query\Processor\OpenproviderProcessor;
use Kevindierkx\Elicit\Query\Processors\Processor;

class OpenproviderConnection extends Connection {

	/**
	 * {@inheritdoc}
	 */
	public function __construct($connector, $config)
	{
		parent::__construct($connector, $config);

		// We use custom query grammar for the Openprovider requests.
		// At this point we have all the information required
		// to set the credentials data we've added in the grammar.
		$this->setCredentials($config);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getDefaultQueryGrammar()
	{
		return new OpenproviderGrammar;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getDefaultPostProcessor()
	{
		return new OpenproviderProcessor;
	}

	/**
	 * Set credentials to the Query Grammar.
	 *
	 * @param array  $config
	 */
	public function setCredentials(array $config)
	{
		$grammar = $this->getQueryGrammar();

		$grammar->setCredentials(
			array_get($config, 'identifier'),
			array_get($config, 'secret')
		);
	}

	/**
	 * Return credentials set in the Query Grammar.
	 *
	 * @return array
	 */
	public function getCredentials()
	{
		$grammar = $this->getQueryGrammar();

		return $grammar->getCredentials();
	}

}
