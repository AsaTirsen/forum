<?php

namespace Forum\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Forum\Answer\Answer;
use Forum\Comment\Comment;
use Forum\Question\Question;
use Forum\User\HTMLForm\UserLoginForm;
use Forum\User\HTMLForm\CreateUserForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class UserController implements ContainerInjectableInterface
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
     * @throws Exception
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $page->add("user/login");

        return $page->render([
            "title" => "A index page",
        ]);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function loginAction() : object
    {
        $page = $this->di->get("page");
        $form = new UserLoginForm($this->di);
        $form->check();
        $data = [
            "form" => $form->getHTML(),
            "title" => "A login page",
            ];
        $page->add("user/login", $data);
        return $page->render($data);
    }

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateUserForm($this->di);
        //check gravatar
        //curl gravatar API
        $form->check();

        $data = [
            "form" => $form->getHTML(),
            "title" => "Create user"
        ];

        $page->add("user/create", $data);
        return $page->render($data);
    }

    public function viewAction($userId): object
    {
        $page = $this->di->get("page");
        $user = new User();
        $question = new Question();
        $answer = new Answer;
        $comment = new Comment;
        $user->setDb($this->di->get("dbqb"));
        $answer->setDb($this->di->get("dbqb"));
        $comment->setDb($this->di->get("dbqb"));
        $question->setDb($this->di->get("dbqb"));
        $user->findById($userId);
        $questions = $question->findAllWhere("user_id = ?", $userId);
        $comments = $comment->findAllWhere("user_id = ?", $userId);
        $answers = $answer->findAllWhere("user_id = ?", $userId);
        $data = [
            "title" => $user->acronym,
            "user" => $user,
            "questions" => $questions,
            "comments" => $comments,
            "answers" => $answers,
        ];

        $page->add("user/view", $data);
        return $page->render($data);
    }
}
