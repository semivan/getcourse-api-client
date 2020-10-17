<?php

namespace Getcourse;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetcourseClient
{
	/**
	 * @var string
	 */
	private $apiUrl;

	/**
	 * @var string
	 */
	private $secretKey;

	/**
	 * @var HttpClientInterface
	 */
	private $httpClient;

	public function __construct(string $account, string $secretKey)
	{
		$this->apiUrl     = "https://$account.getcourse.ru/pl/api/";
		$this->secretKey  = $secretKey;
		$this->httpClient = HttpClient::create();
	}

	public function request(string $endpoint, string $action = null, array $params = [], string $method = 'POST'): Response
	{
		/*{
			"success":"true/false", // результат вызова
			"action":"вызванное действие",
			"info": array
			"error_message": ""
			"error": true
			"error_code": 904
			"result":{
				"success":"true/false", // результат действия
				"user_id":"id пользователя",
				"user_status":"статус пользователя",
				"error_message":"сообщение об ошибке",
				"error":"true/false", // наличие ошибок
			}
		}*/

		$isPostRequest = (strtoupper($method) === 'POST');

		$query = array_filter([
			'key'    => $this->secretKey,
			'action' => $action,
			'params' => $isPostRequest ? base64_encode(json_encode($params)) : null,
		]);

		if (!$isPostRequest) {
			$query += $params;
		}

		$options = [
			($isPostRequest ? 'body' : 'query') => $query,
		];

		try {
			$content = $this->httpClient
				->request($method, $this->apiUrl . $endpoint, $options)
				->toArray();
        } catch (\Exception $e) {
			$content = [
				'success'       => false,
				'error_code'    => $e->getCode(),
				'error_message' => $e->getMessage(),
				'trace'         => $e->getTraceAsString(),
			];
		}

		return new Response($content);
	}
}