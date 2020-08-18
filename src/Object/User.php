<?php

namespace Getcourse\Object;

class User extends AbstractObject
{
	/** @var int */
	private $id;

	/** @var string */
	private $email;
	
	/** @var string */
	private $phone;
	
	/** @var string */
	private $firstName;
	
	/** @var string */
	private $lastName;

	/** @var string */
	private $fullName;
	
	/** @var string */
	private $country;
	
	/** @var string */
	private $city;

	/** @var int */
	private $age;
	
	/** @var string */
	private $birthday;
	
	/** @var string */
	private $createdAt;
	
	/** @var string */
	private $lastActivity;

	/** @var string */
	private $registrationType;
	
	/** @var string */
	private $whereFrom;
	
	/** @var string */
	private $fromPartner;
	
	/** @var int */
	private $partnerId;
	
	/** @var string */
	private $partnerEmail;
	
	/** @var string */
	private $partnerFullName;
	
	/** @var string */
	private $managerFullName;

	/** @var int */
	private $vkId;
	
	/** @var array */
	private $customFields = [];

	/** @var Session */
	private $session;

	public function __construct(array $params = [])
	{
		$this->session = new Session([
			'utm_source'   => $this->extractParam($params, 'utm_source'),
			'utm_medium'   => $this->extractParam($params, 'utm_medium'),
			'utm_campaign' => $this->extractParam($params, 'utm_campaign'),
			'utm_content'  => $this->extractParam($params, 'utm_content'),
			'utm_term'     => $this->extractParam($params, 'utm_term'),
			'utm_group'    => $this->extractParam($params, 'utm_group'),
			'gcpc'         => $this->extractParam($params, 'gcpc'),
			'gcao'         => $this->extractParam($params, 'gcao'),
			'referer'      => $this->extractParam($params, 'referer'),
		]);

		$this->id               = $this->extractParam($params, 'id', 'int');
		$this->email            = $this->extractParam($params, 'Email');
		$this->phone            = $this->extractParam($params, 'Телефон');
		$this->firstName        = $this->extractParam($params, 'Имя');
		$this->lastName         = $this->extractParam($params, 'Фамилия');
		$this->fullName         = $this->extractParam($params, 'ФИО');
		$this->country          = $this->extractParam($params, 'Страна');
		$this->city             = $this->extractParam($params, 'Город');
		$this->age              = $this->extractParam($params, 'Возраст', 'int');
		$this->birthday         = $this->extractParam($params, 'Дата рождения');
		$this->createdAt        = $this->extractParam($params, 'Создан');
		$this->lastActivity     = $this->extractParam($params, 'Последняя активность');
		$this->registrationType = $this->extractParam($params, 'Тип регистрации');
		$this->whereFrom        = $this->extractParam($params, 'Откуда пришел');
		$this->fromPartner      = $this->extractParam($params, 'От партнера');
		$this->partnerId        = $this->extractParam($params, 'ID партнера', 'int');
		$this->partnerEmail     = $this->extractParam($params, 'Email партнера');
		$this->partnerFullName  = $this->extractParam($params, 'ФИО партнера');
		$this->managerFullName  = $this->extractParam($params, 'ФИО менеджера');
		$this->vkId             = $this->extractParam($params, 'VK-ID', 'int');
		$this->customFields     = $params;
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

	public function getPhone(): ?string
	{
		return $this->phone;
	}

	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	public function getFullName(): ?string
	{
		return $this->fullName;
	}

	public function getCountry(): ?string
	{
		return $this->country;
	}

	public function getCity(): ?string
	{
		return $this->city;
	}

	public function getAge(): ?int
	{
		return $this->age;
	}

	public function getBirthday(): ?string
	{
		return $this->birthday;
	}

	public function getCreatedAt(): ?string
	{
		return $this->createdAt;
	}

	public function getLastActivity(): ?string
	{
		return $this->lastActivity;
	}

	public function getRegistrationType(): ?string
	{
		return $this->registrationType;
	}

	public function getWhereFrom(): ?string
	{
		return $this->whereFrom;
	}

	public function getFromPartner(): ?string
	{
		return $this->fromPartner;
	}

	public function getPartnerId(): ?int
	{
		return $this->partnerId;
	}

	public function getPartnerEmail(): ?string
	{
		return $this->partnerEmail;
	}

	public function getPartnerFullName(): ?string
	{
		return $this->partnerFullName;
	}

	public function getManagerFullName(): ?string
	{
		return $this->managerFullName;
	}

	public function getVkId(): ?int
	{
		return $this->vkId;
	}

	public function getCustomFields(): array
	{
		return $this->customFields;
	}

	/**
	 * Получить значение пользовательского поля
	 *
	 * @param string $key Ключ
	 * @return mixed|null
	 */
	public function getCustomFieldValue(string $key)
	{
		return $this->customFields[$key] ?? null;
	}

	public function getSession(): ?Session
	{
		return $this->session;
	}
}