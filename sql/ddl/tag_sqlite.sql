--
-- Craetes a table for tags
--

DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag
(
    "id"       INTEGER PRIMARY KEY NOT NULL,
    "tag"      TEXT                NOT NULL,
    "tag_id"   INTEGER,
    "created"  TIMESTAMP,
    "updated"  DATETIME,
    "deleted"  DATETIME,
    "active"   DATETIME,
    FOREIGN KEY ("tag_id")
        REFERENCES TagQuestion (tag_id)
);
