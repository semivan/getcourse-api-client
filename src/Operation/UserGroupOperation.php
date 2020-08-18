<?php

namespace Getcourse\Operation;

use Getcourse\GetcourseException;
use Getcourse\Object\Group;

class UserGroupOperation extends AbstractOperation
{
	/**
	 * Экспорт пользовательских групп
	 *
	 * @return Group[]
	 */
	public function export(): array
	{
		$groups   = [];
		$response = $this->call('account/groups');

		foreach ($response->getInfo() as $group) {
			$groups[] = new Group($group);
		}

		return $groups;
	}
}
