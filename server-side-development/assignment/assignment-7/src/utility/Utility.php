<?php

class Utility {

	/**
	 * A recursive adaptation of {@link array_search()} to support multidimensional and associate array queries.
	 *
	 * @param mixed $needle     the searched value.
	 * @param array $haystack   the array.
	 * @param bool $strict      when this parameter is set to true then the in_array() function will also check the
	 *                          types of the needle in the haystack.
	 *
	 * @return array|null       return a matching $item when present, null otherwise.
	 */
	public static function array_search_r(mixed $needle, array $haystack, bool $strict = false): array|null {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item, $strict))) {
				return $item;
			}
		}

		return null;
	}

	/**
	 * A recursive adaptation of {@link in_array()} to support multidimensional and associative array queries.
	 *
	 * @param mixed $needle     the searched value.
	 * @param array $haystack   the array.
	 * @param bool $strict      when this parameter is set to true then the in_array() function will also check the
	 *                          types of the needle in the haystack.
	 *
	 * @return bool         return true when needle is found in the array, false otherwise.
	 */
	public static function in_array_r(mixed $needle, array $haystack, bool $strict = false): bool {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item, $strict))) {
				return true;
			}
		}

		return false;
	}
}