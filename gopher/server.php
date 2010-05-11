#!/usr/bin/env php
<?php
include __DIR__.'/functions.php';

// Quest for the configuration file, if it's not given on the command line.
$options = getopt('c:');
if (isset($options['c'])) {
	$search = array($options['c']);
}
else {
	$search = array('/etc/p70.config.php', __DIR__.'/../config.php');
}

foreach ($search as $location) {
	if (file_exists($location)) {
		include $location;
		break;
	}
}

if (!class_exists('Config')) {
	die('No configuration file found');
}

include __DIR__.'/error.php';
include __DIR__.'/../lib/P70.php';

// Figure out what kind of request we have and route accordingly.
$fp = fopen('php://stdin', 'r');
$request = trim(fgets($fp));
fclose($fp);

if (strpos($request, "\t") !== false) {
	// "Search" request, which really means that we want to add a redirect.
	list($selector, $url) = explode("\t", $request);
	include __DIR__.'/add.php';
}
else {
	$request = ltrim($request, '/');

	if (substr($request, 0, 4) == 'URL:') {
		$url = substr($request, 4);
		include __DIR__.'/url.php';
	}
	elseif (substr($request, -1) == '+' && strlen($request) > 1) {
		// Stats page.
		$request = substr($request, 0, -1);
		include __DIR__.'/stats.php';
	}
	elseif (strlen($request) > 0) {
		// Redirect.
		include __DIR__.'/redirect.php';
	}
	else {
		// Index.
		include __DIR__.'/index.php';
	}
}

// vim: set cin ai ts=8 sw=8 noet:
