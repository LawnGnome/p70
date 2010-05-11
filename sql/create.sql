BEGIN;


CREATE TYPE LINKTYPE AS ENUM ('gopher', 'html');


CREATE TABLE "url" (
	"id" BIGSERIAL,
	"url" TEXT NOT NULL,
	PRIMARY KEY ("id")
);

CREATE INDEX "url__url" ON "url" ("url");


CREATE TABLE "link" (
	"id" BIGSERIAL,
	"url" BIGINT NOT NULL,
	"type" LINKTYPE NOT NULL,
	"clicks" BIGINT NOT NULL DEFAULT 0,
	PRIMARY KEY ("id"),
	FOREIGN KEY ("url") REFERENCES "url" ("id")
);


COMMIT;

-- vim: set nocin ai ts=8 sw=8 noet:
