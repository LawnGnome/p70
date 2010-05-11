<?php
$title = 'Oh no! An error occurred!';
include __DIR__.'/html-header.php';
?>
<h1>Oh no! An error occurred!</h1>

<p>
	Unfortunately, something seems to have gone slightly
	awry. We're probably working on it.
</p>

<p>
	If you do feel compelled to point fingers, you should
	probably point them at
	<a href="mailto:<?php echo CONFIG::ADMIN_EMAIL; ?>"><?php echo CONFIG::ADMIN_NAME; ?></a>.
</p>

<?php if (Config::DEBUG): ?>
<p>
	Since debugging is turned on, here's some additional
	information that might be handy:
</p>

<pre><?php echo htmlspecialchars($message); ?></pre>
<?php endif; ?>

<p>
	You may also want to try again in a minute or two.
</p>
<?php
include __DIR__.'/html-footer.php';
// vim: set cin ai ts=8 sw=8 noet:
