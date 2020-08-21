<?php

namespace Getcourse\Operation;

class CreateDealOperation extends AbstractOperation
{
	/**
	 * @var array
	 */
	private $deal = [];

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
	private $system = [
		'return_deal_number'  => 1, // возвращать номер заказа
		'return_payment_link' => 1, // возвращать ссылку на оплату
	];

	public function toArray(): array
	{
		return [
			'deal'    => array_filter($this->deal, function($var) { return $var !== null; }),
			'user'    => array_filter($this->user, function($var) { return $var !== null; }),
			'session' => array_filter($this->session, function($var) { return $var !== null; }),
			'system'  => array_filter($this->system, function($var) { return $var !== null; }),
		];
	}

	public function save()
	{
		$response = $this->call('deals', 'add', $this->toArray());

		return $response;
	}

	/**
	 * @param string $number Номер заказа
	 * @return self
	 */
	public function setNumber(?string $number): self
	{
		$this->deal['deal_number'] = $number;

		return $this;
	}

	/**
	 * @param string $status Код статуса заказа
	 * @return self
	 */
	public function setStatus(?string $status): self
	{
		$this->deal['deal_status'] = $status;

		return $this;
	}

	/**
	 * @param integer $quantity Количество
	 * @return self
	 */
	public function setQuantity(?int $quantity): self
	{
		$this->deal['quantity'] = $quantity;

		return $this;
	}

	/**
	 * @param string $managerEmail Email менеджера
	 * @return self
	 */
	public function setManagerEmail(?string $managerEmail): self
	{
		$this->deal['manager_email'] = $managerEmail;

		return $this;
	}

	/**
	 * @param string $createdAt Дата заказа
	 * @return self
	 */
	public function setCreatedAt(?string $createdAt): self
	{
		$this->deal['deal_created_at'] = $createdAt;

		return $this;
	}

	/**
	 * @param string $finishedAt Дата оплаты/завершения заказа
	 * @return self
	 */
	public function setFinishedAt(?string $finishedAt): self
	{
		$this->deal['deal_finished_at'] = $finishedAt;

		return $this;
	}

	/**
	 * @param float $cost Сумма заказа
	 * @return self
	 */
	public function setCost(float $cost): self
	{
		$this->deal['deal_cost'] = $cost;

		return $this;
	}

	/**
	 * @param string $productTitle Наименование предложения
	 * @return self
	 */
	public function setProductTitle(?string $productTitle): self
	{
		$this->deal['product_title'] = $productTitle;

		return $this;
	}

	/**
	 * @param string $productDescription Описание предложения
	 * @return self
	 */
	public function setProductDescription(?string $productDescription): self
	{
		$this->deal['product_description'] = $productDescription;

		return $this;
	}

	/**
	 * @param string $offerCode Уникальный код предложения
	 * @return self
	 */
	public function setOfferCode(string $offerCode): self
	{
		$this->deal['offer_code'] = $offerCode;

		return $this;
	}

	/**
	 * @param boolean $isPaid Признак оплаты
	 * @return self
	 */
	public function setIsPaid(bool $isPaid): self
	{
		$this->deal['deal_is_paid'] = $isPaid ? 'да' : 'нет';

		return $this;
	}

	/**
	 * @param string $comment Комментарий
	 * @return self
	 */
	public function setComment(?string $comment): self
	{
		$this->deal['deal_comment'] = $comment;

		return $this;
	}

	/**
	 * @param string $paymentType Тип платежа
	 * @return self
	 */
	public function setPaymentType(?string $paymentType): self
	{
		$this->deal['payment_type'] = $paymentType;

		return $this;
	}

	/**
	 * @param string $paymentStatus Статус платежа
	 * @return self
	 */
	public function setPaymentStatus(?string $paymentStatus): self
	{
		$this->deal['payment_status'] = $paymentStatus;

		return $this;
	}

	/**
	 * @param string $field Имя дополнительного поля
	 * @param mixed  $value Значение дополнительного поля
	 * @return self
	 */
	public function addCustomField(string $field, $value = null): self
	{
		$this->deal['addfields'][$field] = $value;

		return $this;
	}

	/**
	 * @param string $partnerEmail Email партнера
	 * @return self
	 */
	public function setPartnerEmail(?string $partnerEmail): self
	{
		$this->deal['partner_email'] = $partnerEmail;

		return $this;
	}

	/**
	 * @param string $currency Код валюты заказа
	 * @return self
	 */
	public function setCurrency(?string $currency): self
	{
		$this->deal['deal_currency'] = $currency;

		return $this;
	}

	/**
	 * @param boolean $multipleOffers Разрешить добавлять несколько предложений в заказ
	 * @return self
	 */
	public function setMultipleOffers(bool $multipleOffers): self
	{
		$this->system['multiple_offers'] = (int) $multipleOffers;

		return $this;
	}

	public function setUser(CreateUserOperation $user): self
	{
		$array = $user->toArray();

		$this->user    = array_merge($array['user'], $this->user);
		$this->session = array_merge($array['session'], $this->session);
		$this->system  = array_merge($array['system'], $this->system);

		return $this;
	}
}
