<?php
try {
	$link = new Link((int) $request);
}
catch (NotFoundException $e) {
	include __DIR__.'/redirect-error.php';
	exit(0);
}

$url = $link->getURL();
$gopher = $url->getLink('gopher');
$html = $url->getLink('html');
$url = $url->getURL();
?>
iStatistics	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
iThe original page this links to is:	/	<?php echo CONFIG::HOST; ?>	70
<?php echo formatContent('h', $url, 'URL:'.sanitise($url)); ?>
i	/	<?php echo CONFIG::HOST; ?>	70
1<?php echo $gopher->getClicks(); ?> user(s) have clicked on this Gopher link.	/<?php echo Base::encode($gopher->getID(), 62); ?>	<?php echo CONFIG::HOST; ?>	70
1<?php echo $html->getClicks(); ?> user(s) have clicked on this HTML link, either over HTTP or Gopher.	/<?php echo Base::encode($html->getID(), 62); ?>	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
1Return to the front page.	/	<?php echo CONFIG::HOST; ?>	70
<?php // vim: set cin ai ts=8 sw=8 noet ff=dos:
