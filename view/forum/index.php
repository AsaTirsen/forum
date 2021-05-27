<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question");



?><h1>Välkommen till forumet</h1>
<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image"; ?><!--" alt="" />-->
<?= $data["content"] ?>



<p>
    <a href="<?= $urlToAskQuestion ?>">Ställ fråga</a>
</p>
