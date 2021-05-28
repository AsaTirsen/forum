--
-- Craetes a linking table for questions and tags
--

DROP TABLE IF EXISTS TagQuestion;
CREATE TABLE TagQuestion
(
    "id"          INTEGER PRIMARY KEY NOT NULL,
    "tag_id"      INTEGER,
    "question_id" INTEGER,
    "created" TIMESTAMP,
    "updated" DATETIME,
    "deleted" DATETIME,
    "active"  DATETIME,
    FOREIGN KEY ("tag_id")
        REFERENCES Question (id),
    FOREIGN KEY ("question_id")
        REFERENCES Tag (tag_id)
);
