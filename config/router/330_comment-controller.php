<?php

/**
 * Mount the controller onto a mountpoint.
 */
return [
    "routes" => [
        [
            "info" => "Comment controller.",
            "mount" => "comment",
            "handler" => "\Forum\Comment\CommentController",
        ],
    ]
];
