#!/usr/bin/env bash
#
#
# Copy the configuration files
rsync -av --exclude navbar --exclude page.php vendor/asatirsen/forum/config ./

# Copy the view
rsync -av vendor/asatirsen/forum/view ./

# copy the src directory
rsync -av vendor/asatirsen/forum/src ./


# copy the src directory
rsync -av vendor/asatirsen/forum/sql ./


sqlite3 data/db.sqlite < sql/ddl/user_sqlite.sql
sqlite3 data/db.sqlite < sql/ddl/tag_question_sqlite.sql
sqlite3 data/db.sqlite < sql/ddl/question_sqlite.sql
sqlite3 data/db.sqlite < sql/ddl/answer_sqlite.sql
sqlite3 data/db.sqlite < sql/ddl/tag_sqlite.sql
sqlite3 data/db.sqlite < sql/ddl/comment_sqlite.sql
