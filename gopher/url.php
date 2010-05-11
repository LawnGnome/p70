<?php
$url = htmlspecialchars($url);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Refresh" content="0;url=<?php echo $url; ?>">
		<title>Redirecting</title>
	</head>
	<body>
		<p>
			You should be redirected momentarily to
			<?php echo $url; ?>. If this doesn't
			occur within a few seconds, you may want to try the
			link below:
		</p>

		<p>
			<a href="<?php echo $url; ?>"><?php echo $url; ?></a>
		</p>
	</body>
</html>
<?php // vim: set cin ai ts=8 sw=8 noet: ?>
