--
-- Craetes a linking table for questions and tags
--

DROP TABLE IF EXISTS TagQuestion;
CREATE TABLE TagQuestion
(
    "id"      INTEGER PRIMARY KEY NOT NULL,
    "tag_id"  INTEGER,
    "question_id" INTEGER
);
