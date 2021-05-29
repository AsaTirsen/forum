<?php

namespace Forum\Comment\HTMLForm;

use Anax\HTMLForm\FormModel;
use Forum\Answer\Answer;
use Forum\Comment\Comment;
use Forum\User\User;
use Psr\Container\ContainerInterface;


/**
 * Form to create an item.
 */
class CreateForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param ContainerInterface $di a service container
     * @param string $questionId the id of the question
     */
    public function __construct(ContainerInterface $di, string $questionId, string $answerId)
    {
        error_log("constructor called");
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Skapa svar",
            ],
            [
                "kommentar" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                ],

                "answer_id" => [
                    "type"        => "hidden",
                    "value"       => $answerId,
                ],

                "question_id" => [
                    "type"        => "hidden",
                    "value"       => $questionId,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Skapa svar",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return bool true if okey, false if something went wrong.
     */
    public function callbackSubmit() : bool
    {
        error_log("callbacksubmit");
        $comment = new Comment();
        $comment->setDb($this->di->get("dbqb"));
        $comment->comment = $this->form->value("kommentar");
        $answerId = $this->form->value("answer_id");
        if (!empty($answerId)) {
            $comment->answer_id = $answerId;
        }
        $questionId = $this->form->value("question_id");
        if (!empty($questionId)) {
            $comment->question_id = $questionId;
        }
        $comment->user_id = $this->di->get("session")->get("user_id");
        var_dump($comment->user_id);
        $comment->save();
        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        $questionId = $this->form->value("question_id");
        if (!empty($questionId)) {
            $this->di->get("response")->redirect("question/read/" . $questionId)->send();
        }
        $answerId = $this->form->value("answer_id");
        if (!empty($answerId)) {
            $answer = new Answer();
            $answer->setDb($this->di->get("dbqb"));
            $answer->findById($answerId);
            $this->di->get("response")->redirect("question/read/" . $answer->question_id)->send();
        }
    }



     /**
      * Callback what to do if the form was unsuccessfully submitted, this
      * happen when the submit callback method returns false or if validation
      * fails. This method can/should be implemented by the subclass for a
      * different behaviour.
      */
     public function callbackFail()
     {
         $this->di->get("response")->redirectSelf()->send();
     }
}
