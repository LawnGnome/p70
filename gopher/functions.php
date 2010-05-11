<?php

function blankLine() {
	return formatLine('i', '');
}

function formatContent($type, $content) {
	$lines = explode("\n", wordwrap(sanitise($content), 80));
	array_walk($lines, function (&$line, $k) use ($type) {
		$line = formatLine($type, $line);
	});
	return implode('', $lines);
}

function formatLine($type, $description, $selector = '/', $host = null, $port = 70) {
	if (is_null($host)) {
		$host = Config::HOST;
	}

	return $type.$description."\t".$selector."\t".$host."\t".$port."\r\n";
}

function sanitise($content) {
	return str_replace("\t", '        ', $content);
}

// vim: set cin ai ts=8 sw=8 noet:
