<?php

namespace Getcourse\Operation;

use Getcourse\GetcourseClient;
use Getcourse\Response;

class AbstractOperation
{
	/**
	 * @var GetcourseClient
	 */
	private $client;

	public function __construct(GetcourseClient $client)
	{
		$this->client = $client;
	}

	protected function call(string $endpoint, string $action = null, array $params = [], string $method = 'POST'): Response
	{
		return $this->client->request($endpoint, $action, $params, $method);
	}
}
