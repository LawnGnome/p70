		<ul id="footer">
			<li id="home">
				<a href="/">Home</a>
			</li>

			<li id="about">
				<a href="/about/">About this site</a>
			</li>

			<li id="code">
				<a href="http://github.com/LawnGnome/p70">Get the code</a>
			</li>

			<li id="copyright">
				Copyright &copy; 2010 <a href="http://xn--9bi.net/">Adam Harvey</a>
			</li>

			<li id="gopher">
				<a href="gopher://<?php echo CONFIG::HOST; ?>/">Switch to Gopher</a>
			</li>
		</ul>
	</body>
</html>
<?php
header('Content-Type: text/html; charset=UTF-8');
header('Content-Length: '.ob_get_length());

// vim: set cin ai ts=8 sw=8 noet:
