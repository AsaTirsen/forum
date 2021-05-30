<?php

namespace Forum\Forum;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Forum\Tag\Tag;
use Forum\User\User;
use Forum\Question\Question;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class ForumController implements ContainerInjectableInterface
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
        $user = new User();
        $tag = new Tag();
        $user_id = $this->di->get("session")->get("user_id");
        $db = $this->di->get("dbqb");
        $question->setDb($db);
        $user->setDb($db);
        $tag->setDb($db);
        $mostActiveUsers = $user->findAllWhere("id in (
        select user_id
        from (select sum(count) as count, user_id
              from (
                       select count(id) as count, user_id
                       from Question
                       group by user_id
                       union
                       select count(id) as count, user_id
                       from Comment
                       group by user_id
                       union
                       select count(id) as count, user_id
                       from Answer
                       group by user_id
                   )
              group by user_id
             ) order by count limit 10
        )", []);
        $mostPopularTags = $tag->findAllWhere("id in (
            select tag_id
            from (
                select count(question_id) as count, tag_id
                from TagQuestion
                group by tag_id
            ) order by count desc limit 10
        )", []);
        $mostRecentQuestions = $db->connect()
            ->execute(
                "select * from Question order by created desc limit 5"
                , [])
            ->fetchAllClass(Question::class);
        $data = [
            "questions" => $question->findAll(),
            "mostActiveUsers" => $mostActiveUsers,
            "mostPopularTags" => $mostPopularTags,
            "mostRecentQuestions" => $mostRecentQuestions,
            "user" => $user->findById($user_id),
            "title" => "Index page"
        ];

        $page->add("forum/index", $data);
        return $page->render($data);
    }

}
