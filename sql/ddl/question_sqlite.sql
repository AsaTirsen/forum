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
    "question_id" INTEGER,
    "created"  TIMESTAMP,
    "updated"  DATETIME,
    "deleted"  DATETIME,
    "active"   DATETIME,
    FOREIGN KEY ("user_id")
        REFERENCES User (id),
    FOREIGN KEY ("question_id")
        REFERENCES TagQuestion (question_id)
);
