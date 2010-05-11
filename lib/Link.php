<?php

class Link {
	private $id;
	private $url;
	private $type;
	private $clicks;

	public function __construct($id) {
		$st = P70::$db->prepare('SELECT "url", "type", "clicks" FROM "link" WHERE "id" = ?');
		$st->execute(array($id));

		if ($st->rowCount() == 0) {
			throw new NotFoundException('No link for ID '.$id);
		}

		$this->id = $id;
		foreach ($st->fetch(PDO::FETCH_ASSOC) as $field => $value) {
			$this->$field = $value;
		}
	}

	public function getClicks() {
		return $this->clicks;
	}

	public function getID() {
		return $this->id;
	}

	public function getType() {
		return $this->type;
	}

	public function getURL() {
		return new URL($this->url);
	}

	public function incrementClicks() {
		$this->clicks += 1;

		P70::$db->beginTransaction();
		$st = P70::$db->prepare('UPDATE "link" SET "clicks" = "clicks" + 1 WHERE "id" = ?');
		$st->execute(array($this->id));
		P70::$db->commit();

		return $this->clicks;
	}
}

// vim: set cin ai ts=8 sw=8 noet:
