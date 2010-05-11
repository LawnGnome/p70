<?php
include __DIR__.'/include.php';

$url = URL::create($_POST['url']);

if (!$url->hasLinks()) {
	$gopher = $url->createLink('gopher');
	$html = $url->createLink('html');
}
else {
	$gopher = $url->getLink('gopher');
	$html = $url->getLink('html');
}

$urls = array(
	'gopher' => 'gopher://'.CONFIG::HOST.'/1/'.Base::encode($gopher->getID(), 62),
	'html' => 'gopher://'.CONFIG::HOST.'/h/'.Base::encode($html->getID(), 62),
	'http' => 'http://'.CONFIG::HOST.'/'.Base::encode($html->getID(), 62),
);

echo json_encode($urls);

header('Content-Type: application/json; charset=UTF-8');
header('Content-Length: '.ob_get_length());

// vim: set cin ai ts=8 sw=8 noet:
