<?php

namespace Getcourse\Operation;

class CreateUserOperation extends AbstractOperation
{
	/**
	 * @var array
	 */
	private $user = [];

	/**
	 * @var array
	 */
	private $session = [];

	/**
	 * @var array
	 */
	private $system = [];

	public function toArray(): array
	{
		return [
			'user'    => array_filter($this->user, function($var) { return $var !== null; }),
			'session' => array_filter($this->session, function($var) { return $var !== null; }),
			'system'  => array_filter($this->system, function($var) { return $var !== null; }),
		];
	}

	public function save()
	{
		$response = $this->call('users', 'add', $this->toArray());

		return $response;
	}

	/**
	 * @param string $email Email
	 * @return self
	 */
	public function setEmail(string $email): self
	{
		$this->user['email'] = $email;

		return $this;
	}

	/**
	 * @param string $phone Телефон
	 * @return self
	 */
	public function setPhone(?string $phone): self
	{
		$this->user['phone'] = $phone;

		return $this;
	}

	/**
	 * @param string $firstName Имя
	 * @return self
	 */
	public function setFirstName(?string $firstName): self
	{
		$this->user['first_name'] = $firstName;

		return $this;
	}

	/**
	 * @param string $lastName Фамилия
	 * @return self
	 */
	public function setLastName(?string $lastName): self
	{
		$this->user['last_name'] = $lastName;

		return $this;
	}

	/**
	 * @param string $country Страна
	 * @return self
	 */
	public function setCountry(?string $country): self
	{
		$this->user['country'] = $country;

		return $this;
	}

	/**
	 * @param string $city Город
	 * @return self
	 */
	public function setCity(?string $city): self
	{
		$this->user['city'] = $city;

		return $this;
	}

	/**
	 * @param string $field Имя дополнительного поля
	 * @param mixed  $value Значение дополнительного поля
	 * @return self
	 */
	public function addCustomField(string $field, $value = null): self
	{
		$this->user['addfields'][$field] = $value;

		return $this;
	}

	/**
	 * @param string|array $group "Группа1" || ["Группа2", "2018-08-01 21:21"]
	 * @return self
	 */
	public function addGroup($group): self
	{
		$this->user['group_name'][] = $group;

		return $this;
	}

	public function setUtmSource(?string $utmSource): self
	{
		$this->session['utm_source'] = $utmSource;

		return $this;
	}

	public function setUtmMedium(?string $utmMedium): self
	{
		$this->session['utm_medium'] = $utmMedium;

		return $this;
	}

	public function setUtmCampaign(?string $utmCampaign): self
	{
		$this->session['utm_campaign'] = $utmCampaign;

		return $this;
	}

	public function setUtmContent(?string $utmContent): self
	{
		$this->session['utm_content'] = $utmContent;

		return $this;
	}

	public function setUtmTerm(?string $utmTerm): self
	{
		$this->session['utm_term'] = $utmTerm;

		return $this;
	}

	public function setUtmGroup(?string $utmGroup): self
	{
		$this->session['utm_group'] = $utmGroup;

		return $this;
	}

	public function setGcpc(?string $gcpc): self
	{
		$this->session['gcpc'] = $gcpc;

		return $this;
	}

	public function setGcao(?string $gcao): self
	{
		$this->session['gcao'] = $gcao;

		return $this;
	}

	public function setReferer(?string $referer): self
	{
		$this->session['referer'] = $referer;

		return $this;
	}

	/**
	 * @param boolean $refresh Обновлять ли существующего пользователя
	 * @return self
	 */
	public function setRefresh(bool $refresh): self
	{
		$this->system['refresh_if_exists'] = (int) $refresh;

		return $this;
	}

	/**
	 * @param $partnerEmail Партнер пользователя
	 * @return self
	 */
	public function setPartnerEmail(?string $partnerEmail): self
	{
		$this->system['partner_email'] = $partnerEmail;
		
		return $this;
	}
}
