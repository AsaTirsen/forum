<?php

namespace Forum\About;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class AboutController implements ContainerInjectableInterface
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
        $page->add("forum/about", []);
        return $page->render([
            "title" => "About page",
        ]);
    }
}
