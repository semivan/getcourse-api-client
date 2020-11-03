<?php

namespace Getcourse\Operation;

use Getcourse\Object\User;

class ExportUsersOperation extends AbstractExportOperation
{
	const STATUS_ACTIVE  = 'active';
	const STATUS_IN_BASE = 'in_base';

	/**
	 * @var array
	 */
	private $filter = [];

	/**
	 * @var int
	 */
	private $groupId;

	/**
	 * @return int ID экспорта
	 */
	public function getExportId(): int
	{
		$endpoint = $this->groupId ? "account/groups/{$this->groupId}/users" : 'account/users';

		return $this->_getExportId($endpoint, $this->filter);
	}

	/**
	 * @param integer $exportId ID экспорта
	 * @return User[]
	 */
	public function export(int $exportId): array
	{
		$users = [];

		foreach ($this->_export($exportId) as $item) {
			$users[] = new User($item);
		}

		return $users;
	}

	/**
	 * @param string|null $from Начальная дата создания пользователей (Y-m-d)
	 * @param string|null $to   Конечная дата создания пользователей (Y-m-d)
	 * @return self
	 */
	public function setCreatedAtPeriod(string $from = null, string $to = null): self
	{
		$this->filter['created_at[from]'] = $from;
		$this->filter['created_at[to]']   = $to;

		return $this;
	}

	/**
	 * @param string|null $from Начальная дата добавления в группу (Y-m-d)
	 * @param string|null $to   Конечная дата добавления в группу (Y-m-d)
	 * @return self
	 */
	public function setAddedAtPeriod(string $from = null, string $to = null): self
	{
		$this->filter['added_at[from]'] = $from;
		$this->filter['added_at[to]']   = $to;

		return $this;
	}

	/**
	 * @param string|null $status Статус пользователя (active|in_base)
	 * @return self
	 */
	public function setStatus(?string $status): self
	{
		$this->filter['status'] = $status;

		return $this;
	}

	/**
	 * @param int|null $groupId ID группы пользователей
	 * @return self
	 */
	public function setGroupId(?int $groupId): self
	{
		$this->groupId = $groupId;

		return $this;
	}
}
