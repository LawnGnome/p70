<?php

class URL {
	private $id;
	private $url;

	public function __construct($id) {
		$st = P70::$db->prepare('SELECT "url" FROM "url" WHERE "id" = ?');
		$st->execute(array($id));

		if ($st->rowCount() == 0) {
			throw new NotFoundException('No URL for ID '.$id);
		}

		$this->id = $id;
		$this->url = $st->fetchColumn();
	}

	public function createLink($type) {
		P70::$db->beginTransaction();

		$st = P70::$db->prepare('INSERT INTO "link" ("url", "type") VALUES (?, ?) RETURNING "id"');
		$st->execute(array($this->id, $type));

		if ($st->rowCount() == 0) {
			P70::$db->rollback();
			throw new NotFoundException('No link ID returned upon creation');
		}

		$id = $st->fetchColumn();
		P70::$db->commit();

		return new Link($id);
	}

	public function getID() {
		return $this->id;
	}

	public function getLink($type) {
		$st = P70::$db->prepare('SELECT "id" FROM "link" WHERE "url" = ? AND "type" = ?');
		$st->execute(array($this->id, $type));

		if ($st->rowCount() == 0) {
			throw new NotFoundException('No link for ID '.$id.' and type '.$type);
		}

		return new Link($st->fetchColumn());
	}

	public function getLinks() {
		$st = P70::$db->prepare('SELECT "id" FROM "link" WHERE "url" = ?');
		$st->execute(array($this->id));

		if ($st->rowCount() == 0) {
			throw new NotFoundException('No links for ID '.$id);
		}

		$links = array();
		while (($id = $st->fetchColumn()) !== false) {
			$links[] = new Link($id);
		}

		return $links;
	}

	public function hasLinks() {
		$st = P70::$db->prepare('SELECT COUNT("id") FROM "link" WHERE "url" = ?');
		$st->execute(array($this->id));

		return ($st->fetchColumn() > 0);
	}

	public function getURL() {
		return $this->url;
	}

	public static function create($url) {
		P70::$db->beginTransaction();

		// Check for an existing URL record.
		try {
			$url = self::get($url);
			P70::$db->commit();
			return $url;
		}
		catch (NotFoundException $e) {}

		$st = P70::$db->prepare('INSERT INTO "url" ("url") VALUES (?) RETURNING "id"');
		$st->execute(array($url));

		if ($st->rowCount() == 0) {
			P70::$db->rollback();
			throw new NotFoundException('No ID returned for new URL');
		}

		$id = $st->fetchColumn();
		P70::$db->commit();

		return new URL($id);
	}

	public static function get($url) {
		$st = P70::$db->prepare('SELECT "id" FROM "url" WHERE "url" = ?');
		$st->execute(array($url));

		if ($st->rowCount() == 0) {
			throw new NotFoundException('No URL '.$url);
		}

		return new URL($st->fetchColumn());
	}
}

// vim: set cin ai ts=8 sw=8 noet:
