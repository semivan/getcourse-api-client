<?php

namespace Getcourse\Object;

class Session extends AbstractObject
{
	/** @var string */
	private $utmSource;

	/** @var string */
	private $utmMedium;

	/** @var string */
	private $utmCampaign;

	/** @var string */
	private $utmContent;

	/** @var string */
	private $utmTerm;

	/** @var string */
	private $utmGroup;

	/** @var string */
	private $gcpc;

	/** @var string */
	private $gcao;

	/** @var string */
	private $referer;

	public function __construct(array $params = [])
	{
		$this->utmSource   = $this->extractParam($params, 'utm_source');
		$this->utmMedium   = $this->extractParam($params, 'utm_medium');
		$this->utmCampaign = $this->extractParam($params, 'utm_campaign');
		$this->utmContent  = $this->extractParam($params, 'utm_content');
		$this->utmTerm     = $this->extractParam($params, 'utm_term');
		$this->utmGroup    = $this->extractParam($params, 'utm_group');
		$this->gcpc        = $this->extractParam($params, 'gcpc');
		$this->gcao        = $this->extractParam($params, 'gcao');
		$this->referer     = $this->extractParam($params, 'referer');
	}

	public function getUtmSource(): ?string
	{
		return $this->utmSource;
	}

	public function getUtmMedium(): ?string
	{
		return $this->utmMedium;
	}

	public function getUtmCampaign(): ?string
	{
		return $this->utmCampaign;
	}

	public function getUtmContent(): ?string
	{
		return $this->utmContent;
	}

	public function getUtmTerm(): ?string
	{
		return $this->utmTerm;
	}

	public function getUtmGroup(): ?string
	{
		return $this->utmGroup;
	}

	public function getGcpc(): ?string
	{
		return $this->gcpc;
	}

	public function getGcao(): ?string
	{
		return $this->gcao;
	}

	public function getReferer(): ?string
	{
		return $this->referer;
	}
}
