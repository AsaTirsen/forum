<?php

namespace Forum\Question;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Forum\Answer\Answer;
use Forum\Comment\Comment;
use Forum\Question\HTMLForm\CreateForm;
use Forum\Forum\HTMLForm\DeleteForm;
use Forum\Forum\HTMLForm\UpdateForm;
use Forum\Tag\Tag;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class QuestionController implements ContainerInjectableInterface
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
        $question = new Question();
        $user_id = $this->di->get("session")->get("user_id");
        if (!$user_id) {
            $this->di->get("response")->redirect("user/login");
        }
        $params = $this->di->get("request")->getGet();
        $answer = new Answer;
        $comment = new Comment;
        $answer->setDb($this->di->get("dbqb"));
        $comment->setDb($this->di->get("dbqb"));
        $question->setDb($this->di->get("dbqb"));
        if (isset($params["user_id"])) {
            $questions = $question->findAllWhere("user_id = ?", $params["user_id"]);
        } else {
            $questions = $question->findAll();
        }
        $data = [
            "questions" => $questions,
            "title" => "A index page"
        ];

        $page->add("forum/question", $data);
        return $page->render($data);
    }

    public function readAction($questionId) {
        $page = $this->di->get("page");
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));
        $questionText = $question->findById($questionId);
        $answer = new Answer;
        $comment = new Comment;
        $tag = new Tag;
        $answer->setDb($this->di->get("dbqb"));
        $comment->setDb($this->di->get("dbqb"));
        $tag->setDb($this->di->get("dbqb"));
        $tags = $tag->findAllWhere("id in (select tag_id from TagQuestion where question_id = ?)", $questionId);
        $answerComments = $comment->findAllWhere(
            "answer_id in (select id from Answer where question_id = ?)",
            $questionId);
        $data = [
            "question" => $questionText,
            "answers" => $answer->findAllWhere("question_id = ?", $questionId),
            "comments" => $comment->findAllWhere("question_id = ?", $questionId),
            "tags" => $tags,
            "answerComments" => $answerComments,
            "title" => "read questions"
        ];
        $page->add("forum/read_question", $data);
        return $page->render($data);
    }

    /**
     * Handler with form to create a new item.
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateForm($this->di);
        $form->check();

        $page->add("forum/create_question", [
            "form" => $form->getHTML()
        ]);

        return $page->render([
            "title" => "Create a item",
        ]);
    }
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




}
