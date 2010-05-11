<?php
try {
	$link = new Link((int) $request);
}
catch (NotFoundException $e) {
	include __DIR__.'/redirect-error.php';
	exit(0);
}

$link->incrementClicks();

if ($link->getType() == 'gopher') {
	include __DIR__.'/redirect-gopher.php';
}
else {
	$url = $link->getURL()->getURL();
	include __DIR__.'/url.php';
}

// vim: set cin ai ts=8 sw=8 noet ff=dos:
