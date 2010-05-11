<?php
include __DIR__.'/include.php';

try {
	$link = new Link(Base::decode($_GET['id'], 62));
}
catch (NotFoundException $e) {
	include __DIR__.'/not-found.php';
	exit(0);
}

$url = $link->getURL();
$gopher = $url->getLink('gopher');
$html = $url->getLink('html');

$stats = array(
	'gopher' => $gopher->getClicks(),
	'html' => $gopher->getClicks(),
	'url' => $url->getURL(),
	'short' => array(
		'gopher' => 'gopher://'.CONFIG::HOST.'/1/'.Base::encode($gopher->getID(), 62),
		'html' => 'gopher://'.CONFIG::HOST.'/h/'.Base::encode($html->getID(), 62),
		'http' => 'http://'.CONFIG::HOST.'/'.Base::encode($html->getID(), 62),
	),
);

$url = htmlspecialchars($url->getURL());

include __DIR__.'/html-header.php';
?>
<h1>Statistics</h1>

<div class="content">
	<p>
		Wondering how many people have clicked through to
		<a href="<?php echo $url; ?>"><?php echo $url; ?></a>?
		Wonder no more.
	</p>

	<ul>
		<li>
			<?php echo $gopher->getClicks(); ?> user(s) have clicked on
			<a href="gopher://<?php echo CONFIG::HOST; ?>/1/<?php echo Base::encode($gopher->getID(), 62); ?>">the Gopher link</a>.
		</li>

		<li>
			<?php echo $html->getClicks(); ?> user(s) have clicked on the
			HTML link, either via
			<a href="gopher://<?php echo CONFIG::HOST; ?>/h/<?php echo Base::encode($html->getID(), 62); ?>">Gopher</a>
			or
			<a href="/<?php echo Base::encode($html->getID(), 62); ?>">HTTP</a>.
		</li>
	</ul>
</div>
<?php
include __DIR__.'/html-footer.php';
// vim: set cin ai ts=8 sw=8 noet:
