BEGIN;

DROP TABLE "link" CASCADE;
DROP TABLE "url" CASCADE;
DROP TYPE IF EXISTS LINKTYPE;

COMMIT;

-- vim: set nocin ai ts=8 sw=8 noet:
