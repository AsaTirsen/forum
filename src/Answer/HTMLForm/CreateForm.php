<?php

namespace Forum\Answer\HTMLForm;

use Anax\HTMLForm\FormModel;
use Forum\Answer\Answer;
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
    public function __construct(ContainerInterface $di, string $questionId)
    {
        error_log("constructor called");
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Skapa svar",
            ],
            [
                "svar" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
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
        $answer = new Answer();
        $answer->setDb($this->di->get("dbqb"));
        $answer->answer = $this->form->value("svar");
        $answer->question_id = $this->form->value("question_id");
        $answer->user_id = $this->di->get("session")->get("user_id");
        var_dump($answer->user_id);
        $answer->save();
        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        error_log("go");
        $this->di->get("response")->redirect("question")->send();
    }



     /**
      * Callback what to do if the form was unsuccessfully submitted, this
      * happen when the submit callback method returns false or if validation
      * fails. This method can/should be implemented by the subclass for a
      * different behaviour.
      */
     public function callbackFail()
     {
         error_log("No go");
         $this->di->get("response")->redirectSelf()->send();
     }
}
