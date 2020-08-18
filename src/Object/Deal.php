<?php

namespace Getcourse\Object;

class Deal extends AbstractObject
{
	/** @var int */
	private $id;

	/** @var string */
	private $number;

	/** @var string */
	private $status;

	/** @var string */
	private $productTitle;

	/** @var string */
	private $paymentSystem;

	/** @var string */
	private $currency;

	/** @var float */
	private $cost;

	/** @var float */
	private $paid;

	/** @var float */
	private $received;

	/** @var float */
	private $tax;

	/** @var float */
	private $paymentSystemCommission;

	/** @var float */
	private $otherCommission;

	/** @var float */
	private $remaining;

	/** @var float */
	private $earned;

	/** @var string */
	private $createdAt;

	/** @var string */
	private $paidAt;

	/** @var string */
	private $partnerSource;

	/** @var string */
	private $partnerCode;

	/** @var int */
	private $partnerId;

	/** @var int */
	private $orderPartnerId;

	/** @var string */
	private $partnerEmail;

	/** @var string */
	private $partnerFullName;

	/** @var string */
	private $managerFullName;

	/** @var array */
	private $tags;

	/** @var array */
	private $offerTags;

	/** @var string */
	private $sessionPartner;
	
	/** @var array */
	private $customFields = [];

	/** @var User */
	private $user;

	/** @var Session */
	private $session;

	public function __construct(array $params = [])
	{
		$this->user = new User([
			'id'             => $this->extractParam($params, 'ID пользователя', 'int'),
			'Email'          => $this->extractParam($params, 'Email'),
			'Телефон'        => $this->extractParam($params, 'Телефон'),
			'Имя'            => $this->extractParam($params, 'Имя'),
			'Фамилия'        => $this->extractParam($params, 'Фамилия'),
			'ФИО'            => $this->extractParam($params, 'Пользователь'),
			'Страна'         => $this->extractParam($params, 'Страна'),
			'Город'          => $this->extractParam($params, 'Город'),
			'Возраст'        => $this->extractParam($params, 'Возраст', 'int'),
			'Дата рождения'  => $this->extractParam($params, 'Дата рождения'),
			'utm_source'     => $this->extractParam($params, 'user_utm_source'),
			'utm_medium'     => $this->extractParam($params, 'user_utm_medium'),
			'utm_campaign'   => $this->extractParam($params, 'user_utm_campaign'),
			'utm_content'    => $this->extractParam($params, 'user_utm_content'),
			'utm_term'       => $this->extractParam($params, 'user_utm_term'),
			'utm_group'      => $this->extractParam($params, 'user_utm_group'),
			'gcpc'           => $this->extractParam($params, 'user_gcpc'),
			'gcao'           => $this->extractParam($params, 'user_gcao'),
			'referer'        => $this->extractParam($params, 'user_referer'),
			'ID партнера'    => $this->extractParam($params, 'ID партнера пользователя'),
			'Email партнера' => $this->extractParam($params, 'Email партнера пользователя'),
			'ФИО партнера'   => $this->extractParam($params, 'ФИО партнера пользователя'),
			'ФИО менеджера'  => $this->extractParam($params, 'ФИО менеджера пользователя'),
			'VK-ID'          => $this->extractParam($params, 'VK-ID'),
		]);

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

		$this->id                      = $this->extractParam($params, 'ID заказа', 'int');
		$this->number                  = $this->extractParam($params, 'Номер'); // '﻿Номер'
		$this->status                  = $this->extractParam($params, 'Статус');
		$this->productTitle            = $this->extractParam($params, 'Title');
		$this->paymentSystem           = $this->extractParam($params, 'Платежная система');
		$this->currency                = $this->extractParam($params, 'Валюта');
		$this->cost                    = $this->extractParam($params, 'Стоимость, '. $this->currency, 'float');
		$this->paid                    = $this->extractParam($params, 'Оплачено', 'float');
		$this->received                = $this->extractParam($params, 'Получено', 'float');
		$this->tax                     = $this->extractParam($params, 'Налог', 'float');
		$this->paymentSystemCommission = $this->extractParam($params, 'Комиссия платежной системы', 'float');
		$this->otherCommission         = $this->extractParam($params, 'Другие комиссии', 'float');
		$this->remaining               = $this->extractParam($params, 'Осталось после вычета комиссии платежной системы и налога', 'float');
		$this->earned                  = $this->extractParam($params, 'Заработано', 'float');
		$this->createdAt               = $this->extractParam($params, 'Дата создания');
		$this->paidAt                  = $this->extractParam($params, 'Дата оплаты');
		$this->partnerSource           = $this->extractParam($params, 'Партнерский источник');
		$this->partnerCode             = $this->extractParam($params, 'Партнерский код');
		$this->partnerId               = $this->extractParam($params, 'ID партнера', 'int');
		$this->orderPartnerId          = $this->extractParam($params, 'ID партнера заказа', 'int');
		$this->partnerEmail            = $this->extractParam($params, 'Email партнера заказа');
		$this->partnerFullName         = $this->extractParam($params, 'ФИО партнера заказа');
		$this->managerFullName         = $this->extractParam($params, 'Менеджер');
		$this->tags                    = $this->extractParam($params, 'Теги', 'array');
		$this->offerTags               = $this->extractParam($params, 'Теги предложений', 'array');
		$this->sessionPartner          = $this->extractParam($params, 'Партнер (сессия)');	
		$this->customFields            = $params;
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getNumber(): ?string
	{
		return $this->number;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function getProductTitle(): ?string
	{
		return $this->productTitle;
	}

	public function getPaymentSystem(): ?string
	{
		return $this->paymentSystem;
	}

	public function getCurrency(): ?string
	{
		return $this->currency;
	}

	public function getCost(): ?float
	{
		return $this->cost;
	}

	public function getPaid(): ?float
	{
		return $this->paid;
	}

	public function getReceived(): ?float
	{
		return $this->received;
	}

	public function getTax(): ?float
	{
		return $this->tax;
	}

	public function getPaymentSystemCommission(): ?float
	{
		return $this->paymentSystemCommission;
	}

	public function getOtherCommission(): ?float
	{
		return $this->otherCommission;
	}

	public function getRemaining(): ?float
	{
		return $this->remaining;
	}

	public function getEarned(): ?float
	{
		return $this->earned;
	}

	public function getCreatedAt(): ?string
	{
		return $this->createdAt;
	}

	public function getPaidAt(): ?string
	{
		return $this->paidAt;
	}

	public function getPartnerSource(): ?string
	{
		return $this->partnerSource;
	}

	public function getPartnerCode(): ?string
	{
		return $this->partnerCode;
	}

	public function getPartnerId(): ?int
	{
		return $this->partnerId;
	}

	public function getOrderPartnerId(): ?int
	{
		return $this->orderPartnerId;
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

	public function getTags(): array
	{
		return $this->tags;
	}

	public function getOfferTags(): array
	{
		return $this->offerTags;
	}

	public function getSessionPartner(): ?string
	{
		return $this->sessionPartner;
	}

	public function getCustomFields(): array
	{
		return $this->customFields;
	}

	public function getUser(): ?User
	{
		return $this->user;
	}

	public function getSession(): ?Session
	{
		return $this->session;
	}
}