<?php

// Create the URL and links in the database.
$urlObj = URL::create($url);

if (!$urlObj->hasLinks()) {
	$gopher = $urlObj->createLink('gopher');
	$html = $urlObj->createLink('html');
}
else {
	$gopher = $urlObj->getLink('gopher');
	$html = $urlObj->getLink('html');
}

$gopher = Base::encode($gopher->getID(), 62);
$html = Base::encode($html->getID(), 62);
?>
iCongratulations!	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
<?php echo formatContent('i', "You've created a short Gopher URL to share with all your friends. Now, when you want to direct them to $url, you can just give them one of the following links:"); ?>
i	/	<?php echo CONFIG::HOST; ?>	70
1gopher://<?php echo CONFIG::HOST; ?>/1/<?php echo $gopher; ?>	/<?php echo $gopher; ?>	<?php echo CONFIG::HOST; ?>	70
iA real, old school Gopher directory list. Admittedly, there are one or two	/	<?php echo CONFIG::HOST; ?>	70
idrawbacks to being this awesome: mostly, it doesn't actually redirect. Sorry.	/	<?php echo CONFIG::HOST; ?>	70
iYour devoted readers will have to actually click on something. Or press ENTER	/	<?php echo CONFIG::HOST; ?>	70
ion something, or do whatever it is their client expects. The point is that it's	/	<?php echo CONFIG::HOST; ?>	70
inot entirely seamless. It is, however, utterly awesome.	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
hgopher://<?php echo CONFIG::HOST; ?>/h/<?php echo $html; ?>	/<?php echo $html; ?>	<?php echo CONFIG::HOST; ?>	70
iA Gopher link that will serve up a HTML page with a redirect. This has less	/	<?php echo CONFIG::HOST; ?>	70
iretro awesome than the first option, but does actually redirect, and still	/	<?php echo CONFIG::HOST; ?>	70
iannoys people whose browsers can't handle Gopher. It's a fair trade, methinks.	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
hhttp://<?php echo CONFIG::HOST; ?>/<?php echo $html; ?>	URL:http://<?php echo CONFIG::HOST; ?>/<?php echo $html; ?>	<?php echo CONFIG::HOST; ?>	70
iThis is a regular HTTP redirect, just like what you get from sites like bit.ly.	/	<?php echo CONFIG::HOST; ?>	70
iNo awesome at all, really, but it does work universally.	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
1You can also get statistics on how many people are clicking your link at this	/<?php echo $gopher; ?>+	<?php echo CONFIG::HOST; ?>	70
1page. You may want to bookmark it for later. You also may not want to. Your	/<?php echo $gopher; ?>+	<?php echo CONFIG::HOST; ?>	70
1call.	/<?php echo $gopher; ?>+	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
i	/	<?php echo CONFIG::HOST; ?>	70
1Return to the front page.	/	<?php echo CONFIG::HOST; ?>	70
<?php // vim: set cin ai ts=8 sw=8 noet ff=dos: ?>
