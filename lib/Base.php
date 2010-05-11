<?php

/* Base2-62 encode and decode routines based on those at
 * http://snipplr.com/view/22246/base62-encode--decode/ originally written by
 * jmiller. */

final class Base {
	const CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	public static function decode($str, $base) {
		self::checkBase($base);

		$n = 0;
		$a = array_flip(str_split(self::CHARS));
		$len = strlen($str);
		
		foreach (range(0, $len - 1) as $i) {
			$n += $a[$str[$i]] * pow($base, $len - $i - 1);
		}

		return $n;
	}

	public static function encode($n, $base) {
		self::checkBase($base);

		$str = '';
		do {
			$i = $n % $base;
			$str = substr(self::CHARS, $i, 1).$str;
			$n = ($n - $i) / $base;
		} while ($n > 0);

		return $str;
	}

	private static function checkBase($base) {
		if (!(is_numeric($base) && $base > 1 && $base < 63)) {
			throw new OutOfRangeException('Base must be between 2 and 62, inclusive');
		}
	}
}

// vim: set cin ai ts=8 sw=8 noet:
