<?php

namespace Forum\Comment;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comment";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $comment;
    public $answer_id;
    public $question_id;
    public $user_id;
    public $created;
    public $updated;
    public $deleted;
    public $active;
}
