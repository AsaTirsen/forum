--
-- Creates a table for answers
--

DROP TABLE IF EXISTS Answer;
CREATE TABLE Answer
(
    "id"          INTEGER PRIMARY KEY NOT NULL,
    "answer"      TEXT                NOT NULL,
    "question_id" INTEGER,
    "created"     TIMESTAMP,
    "updated"     DATETIME,
    "deleted"     DATETIME,
    "active"      DATETIME,
    FOREIGN KEY ("question_id")
        REFERENCES Question (id)
);
