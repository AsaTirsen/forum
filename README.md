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

        composer require forum/forum

# Integrate the module  
## From the root of your Anax repo run:

#### Manually:

        rsync -av vendor/forum/forum/config ./

        rsync -av vendor/forum/forum/view ./

        rsync -av vendor/forum/forum/src ./


#### Or simply: 

        bash vendor/forum/forum/.anax/scaffold/postprocess.d/100_forum.bash


#### Update your navigation: 
Add Forum to your navbar via config/navbar/header.php and via config/navbar/responsive.php

You will need to insert the following lines of code into the items-key in the above files.

        [
            "text" => "Väder",
            "url" => "weather",
            "title" => "Få väderprognos",
        ],
        [
            "text" => "VäderAPI",
            "url" => "weather_api",
            "title" => "Få väderprognos",
        ],
