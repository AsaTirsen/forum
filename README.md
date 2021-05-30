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
