<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Forum",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Login",
            "url" => "user/login",
            "title" => "Logga in.",
        ],
        [
            "text" => "Questions",
            "url" => "questions",
            "title" => "Frågor",
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
    ],
];
