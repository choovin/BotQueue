<?php
/*
	This file is part of BotQueue.

	BotQueue is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	BotQueue is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with BotQueue.  If not, see <http://www.gnu.org/licenses/>.
  */


namespace App\Model\Entity;

use Cake\ORM\Entity;


class AppEntity extends Entity {

	/**
	 * @param string $value or array $keys or NULL for complete array result
	 * @param array $options (actual data)
	 * @param null $default
	 * @return mixed string/array
	 */
	public static function enum($value, $options, $default = null) {
		if ($value !== null && !is_array($value)) {
			if (array_key_exists($value, $options)) {
				return $options[$value];
			}
			return $default;
		} elseif ($value !== null) {
			$newOptions = array();
			foreach ($value as $v) {
				$newOptions[$v] = $options[$v];
			}
			return $newOptions;
		}
		return $options;
	}
}