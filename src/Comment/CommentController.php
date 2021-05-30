<?php

namespace Forum\Comment;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Forum\Comment\HTMLForm\CreateForm;
use Forum\Answer\Answer;
use Forum\Question\Question;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class CommentController implements ContainerInjectableInterface
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

    public function questionAction(int $questionId): object
    {
        $page = $this->di->get("page");
        $form = new CreateForm($this->di, $questionId, "");
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));
        $form->check();
        $text = $question->findById($questionId)->question;
        $data = [
            "form" => $form->getHTML(),
            "text" => $text,
            "title" => "create comment",
        ];
        $page->add("forum/create_comment", $data);
        return $page->render($data);
    }


    public function answerAction(int $answerId): object
    {
        $page = $this->di->get("page");
        $form = new CreateForm($this->di, "", $answerId);
        $answer = new Answer();
        $answer->setDb($this->di->get("dbqb"));
        $form->check();
        $text = $answer->findById($answerId)->answer;
        $data = [
            "form" => $form->getHTML(),
            "text" => $text,
            "title" => "create comment",
        ];
        $page->add("forum/create_comment", $data);
        return $page->render($data);
    }
}
