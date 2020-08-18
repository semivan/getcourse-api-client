<?php

namespace Getcourse\Object;

class Message extends AbstractObject
{
	/** @var string */
	private $email;
	
	/** @var string */
	private $transport;

	/** @var string */
	private $mailingId;

	/** @var array */
	private $params;

	public function toArray(): array
	{
		return [
			'message' => [
				'email'      => $this->email,
				'transport'  => $this->transport,
				'mailing_id' => $this->mailingId,
				'params'     => $this->params,
			],
		];
	}

	public function setEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}

	public function setTransport(string $transport): self
	{
		$this->transport = $transport;

		return $this;
	}

	public function setMailingId(string $mailingId): self
	{
		$this->mailingId = $mailingId;

		return $this;
	}

	public function addParam(string $key, $value): self
	{
		$this->params[$key] = $value;

		return $this;
	}
}