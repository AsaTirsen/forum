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
            "url" => "about",
            "title" => "Om denna webbplats.",
        ],
    ],
];
