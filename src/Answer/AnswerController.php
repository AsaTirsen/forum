<?php

namespace Forum\Answer;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Forum\Answer\HTMLForm\CreateForm;
use Forum\Forum\HTMLForm\DeleteForm;
use Forum\Forum\HTMLForm\UpdateForm;
use Forum\Question\Question;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class AnswerController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * @var $data description
     */
    //private $data;


    // /**
    //  * The initialize method is optional and will always be called before the
    //  * target method/action. This is a convienient method where you could
    //  * setup internal properties that are commonly used by several methods.
    //  *
    //  * @return void
    //  */
    // public function initialize() : void
    // {
    //     ;
    // }


    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @return object as a response object
     * @throws Exception
     *
     */
    public function indexActionGet(): object
    {
        $user_id = $this->di->get("session")->get("user_id");
        var_dump($user_id);
        if (!$user_id) {
            $this->di->get("response")->redirect("user/login");
        }
    }

    public function createAction(int $questionId): object
    {
        $page = $this->di->get("page");
        $form = new CreateForm($this->di, $questionId);
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));
        $form->check();
        $questionText = $question->findById($questionId)->question;
        $data = [
            "form" => $form->getHTML(),
            "question" => $questionText,
            "title" => "create answer",
        ];
        $page->add("forum/create_answer", $data);
        return $page->render($data);
    }


    /**
     * Handler with form to delete an item.
     *
     * @return object as a response object
     */
    public function deleteAction(): object
    {
        $page = $this->di->get("page");
        $form = new DeleteForm($this->di);
        $form->check();

        $page->add("book/crud/delete", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Delete an item",
        ]);
    }


    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function updateAction(int $id): object
    {
        $page = $this->di->get("page");
        $form = new UpdateForm($this->di, $id);
        $form->check();

        $page->add("book/crud/update", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Update an item",
        ]);
    }

}
