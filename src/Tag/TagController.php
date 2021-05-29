<?php

namespace Forum\Tag;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Forum\Question\Question;
use Forum\Question\HTMLForm\CreateForm;
use Forum\Forum\HTMLForm\DeleteForm;
use Forum\Forum\HTMLForm\UpdateForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class TagController implements ContainerInjectableInterface
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
        $page = $this->di->get("page");
        $user_id = $this->di->get("session")->get("user_id");
        $questionArray = [];
        $tag = new Tag;
        $tag->setDb($this->di->get("dbqb"));
        if (!$user_id) {
            $this->di->get("response")->redirect("user/login");
        }
        $params = $this->di->get("request")->getGet();
        if ($params) {
            $tag_id = $params["tag_id"];
            $question = new Question();
            $question->setDb($this->di->get("dbqb"));
            $questionArray = $question->findAllWhere(
                "id in (select question_id from TagQuestion where tag_id=?)",
                $tag_id);
        }

        $data = [
            "tags" => $tag->findAll(),
            "title" => "Tag page",
            "questionsArray" => $questionArray,
            "selectedTagId" => isset($params["tag_id"]) ? $params["tag_id"] : null
        ];
        $page->add("forum/tag", $data);
        return $page->render($data);
    }
    //TODO if params, then find that tag id in tagQuestion and the question id for that tag
    //find the questions from Question with that question id and publish on question/tagged


    /**
     * Handler with form to create a new item.
     *
     * @return object as a response object
     */
//    public
//    function createAction(): object
//    {
//        $page = $this->di->get("page");
//        $form = new CreateForm($this->di);
//        $form->check();
//
//        $page->add("forum/create_question", [
//            "form" => $form->getHTML()
//        ]);
//
//        return $page->render([
//            "title" => "Create a item",
//        ]);
//    }

//    public function answerAction()
//    {
//        $page = $this->di->get("page");
//        $form = new CreateForm($this->di);
//        $form->check();
//        $answer = new Answer();
//        $answer->setDb($this->di->get("dbqb"));
//        $page->add("forum/create_answer", [
//            "form" => $form->getHTML()
//        ]);
//
//        return $page->render([
//            "title" => "Delete an item",
//        ]);
//    }


    /**
     * Handler with form to delete an item.
     *
     * @return object as a response object
     */
    public
    function deleteAction(): object
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
    public
    function updateAction(int $id): object
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
