<?php

namespace Getcourse\Object;

class AbstractObject
{
    protected static function extractParam(array &$params, string $key, string $type = 'string', $default = null)
    {
        $val = $params[$key] ?? null;
        
        unset($params[$key]);
		
		if (is_null($val)) {
			if ($type === 'array') return [];

			return $default;
		}

        switch ($type) {
            case 'int':
                return intval($val);
                break;

            case 'float':
                return floatval($val);
                break;

            case 'bool':
                return boolval($val);
                break;

			case 'datetime':
				return new \DateTime($val);
				break;

			case 'array':
				return is_array($val) ? $val : unserialize($val);
				break;

            case 'string':
                return $val;
                break;
        }
	}
}