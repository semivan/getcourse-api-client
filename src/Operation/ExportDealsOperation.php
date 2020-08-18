<?php

namespace Getcourse\Operation;

use Getcourse\Object\Deal;

class ExportDealsOperation extends AbstractExportOperation
{
	const STATUS_NEW                = 'new';
	const STATUS_PAYED              = 'payed';
	const STATUS_CANCELLED          = 'cancelled';
	const STATUS_FALSE              = 'false';
	const STATUS_IN_WORK            = 'in_work';
	const STATUS_PAYMENT_WAITING    = 'payment_waiting';
	const STATUS_PART_PAYED         = 'part_payed';
	const STATUS_WAITING_FOR_RETURN = 'waiting_for_return';
	const STATUS_NOT_CONFIRMED      = 'not_confirmed';
	const STATUS_PENDING            = 'pending';

	/**
	 * @var array
	 */
	private $filter = [];

	/**
	 * @return int ID экспорта
	 */
	public function getExportId(): int
	{
		return $this->_getExportId('account/deals', $this->filter);
	}

	public function export(int $exportId): array
	{
		$users = [];

		foreach ($this->_export($exportId) as $item) {
			$users[] = new Deal($item);
		}

		return $users;
	}

	/**
	 * @param string|null $from Начальная дата создания заказов (Y-m-d)
	 * @param string|null $to   Конечная дата создания заказов (Y-m-d)
	 * @return self
	 */
	public function setCreatedAtPeriod(string $from = null, string $to = null): self
	{
		$this->filter['created_at[from]'] = $from;
		$this->filter['created_at[to]']   = $to;

		return $this;
	}

	/**
	 * @param string|null $from Начальная дата оплаты заказа (Y-m-d)
	 * @param string|null $to   Конечная дата оплаты заказа (Y-m-d)
	 * @return self
	 */
	public function setPayedAtPeriod(string $from = null, string $to = null): self
	{
		$this->filter['payed_at[from]'] = $from;
		$this->filter['payed_at[to]']   = $to;

		return $this;
	}

	/**
	 * @param string|null $from Начальная дата завершения заказа (Y-m-d)
	 * @param string|null $to   Конечная дата завершения заказа (Y-m-d)
	 * @return self
	 */
	public function setFinishedAtPeriod(string $from = null, string $to = null): self
	{
		$this->filter['finished_at[from]'] = $from;
		$this->filter['finished_at[to]']   = $to;

		return $this;
	}

	/**
	 * @param string|null $status Статус заказа (new|payed|cancelled|false|in_work|payment_waiting|part_payed|waiting_for_return|not_confirmed|pending)
	 * @return self
	 */
	public function setStatus(?string $status): self
	{
		$this->filter['status'] = $status;

		return $this;
	}
}
