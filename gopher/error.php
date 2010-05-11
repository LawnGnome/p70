<?php

// Error handling for the Gopher interface.

function printError($message) {
	ob_clean();

	/* Theoretically we should be using type 3 through this function, but
	 * that doesn't do useful things in Firefox. */

	echo formatContent('i', 'Oh no! An error occurred!');
	echo blankLine();

	echo formatContent('i', 'The error has been logged. Emergency teams of crack coders are en route. There is no need to panic.');
	echo blankLine();
	
	echo formatContent('i', 'If you do feel compelled to point fingers, you should probably point them at '.Config::ADMIN_NAME.', who you can raise at the following e-mail address:');
	echo formatLine('h', Config::ADMIN_EMAIL, 'URL:mailto:'.Config::ADMIN_EMAIL);
	echo blankLine();

	if (Config::DEBUG) {
		echo formatContent('i', 'Since the administrator has debugging switched on, you can get a bit more information, which is:');
		echo blankLine();
		echo formatContent('i', $message);
	}

	ob_end_flush();
	exit(0);
}

/* Start output buffering so we can blow away any intermediate output if
 * needed. */
ob_start();

// Set up our handlers.
set_error_handler(function ($errno, $errstr, $errfile, $errline, $errcontext) {
	printError("$errfile:$errline: $errstr");
});

set_exception_handler(function ($e) {
	printError($e->getMessage());
});

// vim: set cin ai ts=8 sw=8 noet:
