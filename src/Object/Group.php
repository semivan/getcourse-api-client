<?php

namespace Getcourse\Object;

class Group extends AbstractObject
{
	/** @var int */
	private $id;
	
	/** @var string */
	private $name;

	public function __construct(array $params = [])
	{
		$this->id   = $this->extractParam($params, 'id', 'int');
		$this->name = $this->extractParam($params, 'name');
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getName(): ?string
	{
		return $this->name;
	}
}