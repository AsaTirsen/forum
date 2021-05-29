--
-- Creates a table for answers
--

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment
(
    "id"          INTEGER PRIMARY KEY NOT NULL,
    "comment"     TEXT                NOT NULL,
    "answer_id"   INTEGER,
    "question_id"   INTEGER,
    "user_id"     INTEGER,
    "created"     TIMESTAMP,
    "updated"     DATETIME,
    "deleted"     DATETIME,
    "active"      DATETIME,
    FOREIGN KEY ("answer_id")
        REFERENCES Answer (id),
    FOREIGN KEY ("question_id")
        REFERENCES Question (id),
    FOREIGN KEY ("user_id")
        REFERENCES User (id)
);
