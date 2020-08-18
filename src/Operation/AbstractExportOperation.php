<?php

namespace Getcourse\Operation;

use Getcourse\GetcourseException;

class AbstractExportOperation extends AbstractOperation
{
	/**
	 * @return int ID экспорта
	 */
	protected function _getExportId(string $endpoint, array $filter): int
	{
		$response = $this->call($endpoint, null, $filter, 'GET');
		$exportId = $response->getInfo()['export_id'] ?? null;

		if (!$exportId) {
			throw new GetcourseException('Не удалось получить ID экспорта');
		}

		return $exportId;
	}

	/**
	 * @param integer $exportId ID экспорта
	 * @param boolean $assoc    Преобразовать в ассоциативный массив
	 * @return array
	 */
	public function _export(int $exportId, bool $assoc = true): array
	{
		$response = $this->call('account/exports/'. $exportId, null, [], 'GET');

		if (!$assoc) {
			return $response->getInfo();
		}

		$result = [];
		$fields = $response->getInfo()['fields'] ?? [];
		$items  = $response->getInfo()['items'] ?? [];

		foreach ($items as $item) {
			$newItem = [];

			foreach ($fields as $index => $name) {
				$newItem[$name] = $item[$index] ?? null;
			}

			$result[] = $newItem;
		}

		return $result;
	}
}
