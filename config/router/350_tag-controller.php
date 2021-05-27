<?php

/**
 * Mount the controller onto a mountpoint.
 */
return [
    "routes" => [
        [
            "info" => "Tag controller.",
            "mount" => "tag",
            "handler" => "\Forum\Forum\TagController",
        ],
    ]
];
