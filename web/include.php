<?php

$search = array('/etc/p70.config.php', __DIR__.'/../config.php');

foreach ($search as $location) {
	if (file_exists($location)) {
		include $location;
		break;
	}
}

if (!class_exists('Config')) {
	die('No configuration file found');
}

ob_start();

function printError($message) {
	ob_clean();

	include __DIR__.'/error.php';
	
	header('HTTP/1.1 500 Internal Server Error');
	header('Content-Type: text/html; charset=UTF-8');
	header('Content-Length: '.ob_get_length());

	ob_end_flush();
	exit(0);
}

// Set up our handlers.
set_error_handler(function ($errno, $errstr, $errfile, $errline, $errcontext) {
	printError("$errfile:$errline: $errstr");
});

set_exception_handler(function ($e) {
	printError($e->getMessage());
});

include __DIR__.'/../lib/P70.php';

// vim: set cin ai ts=8 sw=8 noet:
