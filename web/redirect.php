<?php
include __DIR__.'/include.php';

try {
	$link = new Link(Base::decode($_GET['id'], 62));
	$link->incrementClicks();
	header('Location: '.$link->getURL()->getURL());
}
catch (NotFoundException $e) {
	include __DIR__.'/not-found.php';
}

// vim: set cin ai ts=8 sw=8 noet:
