--
-- Craetes a table for questions
--

DROP TABLE IF EXISTS Question;
CREATE TABLE Question
(
    "id"       INTEGER PRIMARY KEY NOT NULL,
    "title"    TEXT                NOT NULL,
    "question" TEXT                NOT NULL,
    "user_id"  INTEGER             NOT NULL,
    "created"  TIMESTAMP,
    "updated"  DATETIME,
    "deleted"  DATETIME,
    "active"   DATETIME,
    FOREIGN KEY ("user_id")
        REFERENCES User (id),
    FOREIGN KEY ("id")
        REFERENCES TagQuestion (question_id)
);
