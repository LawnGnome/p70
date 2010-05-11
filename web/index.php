<?php
include __DIR__.'/include.php';
include __DIR__.'/html-header.php';
?>
<h1><?php echo CONFIG::SITE_TITLE; ?></h1>

<p id="blurb" class="content">
	<?php echo CONFIG::SITE_TITLE; ?> provides Gopher and HTTP URL
	shortening. Really, though, you should be using 
	<a href="gopher://<?php echo CONFIG::HOST; ?>/">the Gopher version</a>.
	It's hot.
</p>

<div id="form-result" class="content">
	<form method="POST" action="/add/">
		<input id="url" type="text">

		<input id="submit" type="submit" value="Shorten!">
	</form>

	<div id="success">
		<p>
			Your URL has been shortened! There are three versions
			you may wish to hand out:
		</p>

		<ul>
			<li>
				<a id="gopher-gopher"></a>
				&mdash;
				A Gopher version that is full of pure Gopher
				goodness. There are no sneaky HTML pages here
				or clever redirects, just all Gopher action all
				the time. This may not be completely convenient
				for your viewers, since it relies on their
				browser supporting Gopher and their willingness
				to click something, but it is impressively
				Gophery.
			</li>

			<li>
				<a id="gopher-html"></a>
				&mdash;
				A Gopher version that uses the power of HTML to
				compel the viewer's browser to redirect to the
				page. It still requires some Gopher love, but
				is probably a bit more convenient. As long as
				your viewers aren't using Internet Explorer,
				Safari, Chrome, Opera...
			</li>

			<li>
				<a id="http"></a>
				&mdash;
				A regular HTTP redirect for the
				&quot;normal&quot; viewer. Whoever that is.
			</li>
		</ul>

		<p>
			Down the track, if you want to access some statistics
			on how many times your short URL has been used, you can
			do so by going to
			<a id="stats-gopher"></a> or
			<a id="stats-http"></a>.
		</p>

		<p>
			You may shorten another URL, if you like. Or, better
			yet, you could do so through
			<a href="gopher://<?php echo CONFIG::HOST; ?>/">the Gopher interface</a>.
			You know it makes sense.
		</p>
	</div>

	<div id="failure">
		I seem to have failed miserably to provide a shortened URL. You
		may just have to hand out the non-shortened URL instead. Go on.
		What's the worst that could happen?
	</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/p70.js"></script>
<?php
include __DIR__.'/html-footer.php';
// vim: set cin ai ts=8 sw=8 noet:
