[![Build Status](https://travis-ci.org/AsaTirsen/forum.svg?branch=main)](https://travis-ci.org/AsaTirsen/forum)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AsaTirsen/forum/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/AsaTirsen/forum/?branch=main)

[![Code Coverage](https://scrutinizer-ci.com/g/AsaTirsen/forum/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/AsaTirsen/forum/?branch=main)

[![Build Status](https://scrutinizer-ci.com/g/AsaTirsen/forum/badges/build.png?b=main)](https://scrutinizer-ci.com/g/AsaTirsen/forum/build-status/main)

[![Code Intelligence Status](https://scrutinizer-ci.com/g/AsaTirsen/forum/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
# Anax module for questions, answers and comments
This module can be incorporated with the [Anax framework](https://github.com/canax) to provide a forum for 
asking questions, answering questions and commenting.

# To install
In your composer.json do:

        composer require asatirsen/forum

# Integrate the module  
## From the root of your Anax repo run:

#### Manually:

# Copy the configuration files
    rsync -av --exclude navbar --exclude page.php vendor/asatirsen/forum/config ./

# Copy the view
    rsync -av vendor/asatirsen/forum/view ./

# copy the src directory
    rsync -av vendor/asatirsen/forum/src ./

# copy the sql directory
    rsync -av vendor/asatirsen/forum/sql ./

#### Or simply: 

        bash vendor/asatirsenforum/.anax/scaffold/postprocess.d/100_forum.bash
#### create databases
    sqlite3 data/db.sqlite < sql/ddl/user_sqlite.sql
    sqlite3 data/db.sqlite < sql/ddl/tag_question_sqlite.sql
    sqlite3 data/db.sqlite < sql/ddl/question_sqlite.sql
    sqlite3 data/db.sqlite < sql/ddl/answer_sqlite.sql
    sqlite3 data/db.sqlite < sql/ddl/tag_sqlite.sql
    sqlite3 data/db.sqlite < sql/ddl/comment_sqlite.sql


#### Update your navigation: 
Add Forum to your navbar via config/navbar/header.php and via config/navbar/responsive.php

You will need to insert the following lines of code into the items-key in the above files.

        [
            "text" => "Forum",
            "url" => "forum",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Logga in",
            "url" => "user/login",
            "title" => "Logga in.",
        ],
        [
            "text" => "Frågor",
            "url" => "question",
            "title" => "Frågor",
        ],
        [
            "text" => "Taggar",
            "url" => "tag",
            "title" => "Taggar",
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
