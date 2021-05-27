<?php

namespace Forum\Question\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Forum\Question\Question;
use Forum\User\User;


/**
 * Form to create an item.
 */
class CreateForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Skapa fråga",
            ],
            [
                "titel" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "fråga" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Skapa fråga",
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
        $question = new Question();
        $user = new User();
        $user_id = $this->di->get("session")->get("username", $user->id);
        error_log($user_id);
        $question->setDb($this->di->get("dbqb"));
        $question->title  = $this->form->value("titel");
        $question->question = $this->form->value("fråga");
        $question->user_id = $user_id;
        error_log($user_id . $question->title . $question->question);
        $question->save();
        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        $this->di->get("response")->redirect("forum/index")->send();
    }



     /**
      * Callback what to do if the form was unsuccessfully submitted, this
      * happen when the submit callback method returns false or if validation
      * fails. This method can/should be implemented by the subclass for a
      * different behaviour.
      */
     public function callbackFail()
     {
         print_r("No go");
         $this->di->get("response")->redirectSelf()->send();
     }
}
