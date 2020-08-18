<?php

namespace Getcourse;

class Response
{
	/**
	 * @var array
	 */
	private $params;

	public function __construct(array $params)
	{
		$this->params = $params;
	}
 
	public function isSuccess(): bool
	{
		return !empty($this->params['success']);
	}
 
	public function getErrorMessage(): string
	{
		return $this->params['error_message'] ?? 'Ошибка не установлена';
	}
 
	public function getErrorCode(): int
	{
		return $this->params['error_code'] ?? 0;
	}

	public function getTrace(): ?string
	{
		return $this->params['trace'] ?? null;
	}

	public function getAction(): ?string
	{
		return $this->params['action'] ?? null;
	}

	public function getResult(): array
	{
		return $this->params['result'] ?? [];
	}

	public function getInfo(): array
	{
		return $this->params['info'] ?? [];
	}
}