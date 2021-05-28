--
-- Craetes a table for tags
--

DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag
(
    "id"      INTEGER PRIMARY KEY NOT NULL,
    "name"    TEXT                NOT NULL,
    "created" TIMESTAMP,
    "updated" DATETIME,
    "deleted" DATETIME,
    "active"  DATETIME,
    FOREIGN KEY ("id")
        REFERENCES TagQuestion (tag_id)
);
