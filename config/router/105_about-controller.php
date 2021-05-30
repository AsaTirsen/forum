<?php

/**
 * Mount the controller onto a mountpoint.
 */
return [
    "routes" => [
        [
            "info" => "about controller.",
            "mount" => "about",
            "handler" => "\Forum\About\AboutController",
        ],
    ]
];
