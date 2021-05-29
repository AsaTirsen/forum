<?php

namespace Forum\Answer;

use Anax\DatabaseActiveRecord\ActiveRecordModel;
use Forum\Comment\Comment;

/**
 * A database driven model using the Active Record design pattern.
 */
class Answer extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Answer";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $answer;
    public $question_id;
    public $user_id;
    public $created;
    public $updated;
    public $deleted;
    public $active;

}
