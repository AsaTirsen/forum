<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question");

$user = $data["user"];
$mostActiveUsers = $data["mostActiveUsers"];
$mostPopularTags = $data["mostPopularTags"];
$mostRecentQuestions = $data["mostRecentQuestions"];
?>
<article>
<h1>Välkommen till forumet <img src="<?= $user->getGravatar() ?>" alt=""/> <?= $user->acronym ?></h1>

<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image";
?><!--" alt="" />-->
<table class="full-width">
    <tr>
        <th>Senaste frågorna</th>
        <th>Mest aktiva användare</th>
        <th>Populäraste taggarna</th>
    </tr>
<tr>
    <td><?php foreach ($mostRecentQuestions as $question) : ?>
        <p>
            <a href="<?= url("question/read/{$question->id}"); ?>">
                <?= $question->title ?>
            </a>
        </p>
    <?php endforeach ?></td>


    <?php if (empty($mostActiveUsers)) : ?>
        Ingen användare har någon aktivitet
    <?php endif ?>

    <td><?php foreach ($mostActiveUsers as $user) : ?>
     <p><a href="<?= url("question?user_id={$user->id}"); ?>">
            <img src="<?= $user->getGravatar() ?>" alt=""/>
            <?= $user->acronym ?>
        </a></p>
    <?php endforeach ?></td>


        <?php if (empty($mostPopularTags)) : ?>
            Ingen användare har någon aktivitet
        <?php endif ?>

    <td><?php foreach ($mostPopularTags as $tag) : ?>
    <p><a href="<?= url("tag?tag_id={$tag->id}"); ?>"><?= $tag->name ?></a></p>
        <?php endforeach ?></td>
</tr>
</table>
</article>
