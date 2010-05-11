<?php

include __DIR__.'/Base.php';
include __DIR__.'/Link.php';
include __DIR__.'/URL.php';

class NotFoundException extends Exception {}

final class P70 {
	public static $db;

	public static function init() {
		self::$db = new PDO(Config::DSN);
		self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}

P70::init();

// vim: set cin ai ts=8 sw=8 noet:
