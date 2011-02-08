# p70.us 0.1.0
<https://github.com/LawnGnome/p70>

## Description

A URL shortening service no different to the approximately eleventy million
already in existence, except that this one supports Gopher.

Also, I think it's actually fairly decently written. You may not.

## An Apology of Sorts

So, it's taken me quite a while to get around to pushing this. This is mostly
because I originally intended to clean this up before putting up on GitHub, but
I've ended up deciding that I can't be bothered and it probably isn't worth the
effort anyway.

## Requirements

* PHP 5.3.
* PostgreSQL (I use 8.3 on my server at present, but any vaguely recent version
  should be fine). I've no interest in maintaining a MySQL/SQLite/NoSQL port,
  but if you get it running and have a reasonably clean patch, feel free to
  submit a pull request.

To run the Gopher server:

* Some sort of inetd pointing at `gopher/server.php`. I actually use inetd,
  because I have a couple of rather odd requirements, but
  xinetd should generally do the job as well.

## Installation

1. Create a database.
2. Run `sql/create.sql` against that database.
3. Copy `config.php.dist` to `config.php` and modify the values therein
   appropriately.
4. Put the `web` directory somewhere your Web server can find it.
5. (Optional: for Gopher support) Configure your inetd (or inetd-alike) to
   execute `gopher/server.php` when you get requests on the port you want to
   use. (I'd strongly recommend port 70, because some Gopher implementations
   actually break when used against other ports, but it's up to you.)

## Theming

There's no real support for theming, but the code is ridiculously simple. Pull
apart the PHP, CSS and JS files in `web` and have at it. Similarly, you can
modify the PHP files in `gopher` to change the text the Gopher server emits.

## Problems, Reports, Patches

You're probably best off hitting [GitHub](https://github.com/LawnGnome/p70)
(and submitting a pull request if you have a patch), but if you're really
desperate, you can [e-mail me](mailto:aharvey@php.net) if you really want to.
