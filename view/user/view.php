<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question");

$user = $data["user"];
$answers = $data["answers"];
$comments = $data["comments"];
$questions = $data["questions"];
$urlToUpdate = url("user/update");

?>
<article>
<h1><a href="<?= url("user/update/{$user->id}"); ?>"><img src="<?= $user->getGravatar() ?>" alt=""/> <?= $user->acronym ?></a></h1>


<table class="full-width">
    <tr>
        <th>Frågor</th>
        <th>Svar</th>
        <th>Kommentarer</th>
    </tr>
<tr>
    <td><?php foreach ($questions as $question) : ?>
        <p>
            <a href="<?= url("question/read/{$question->id}"); ?>">
                <?= $question->title ?>
            </a>
        </p>
    <?php endforeach ?></td>


    <td><?php foreach ($answers as $answer) : ?>
            <p><a href="<?= url("question/read/{$answer->question_id}"); ?>">
                    <?= $answer->answer ?>
                </a></p>
        <?php endforeach ?></td>

    <td><?php foreach ($comments as $comment) : ?>
            <p>
                    <?= $comment->comment ?>
            </p>
        <?php endforeach ?></td>
</tr>
</table>
</article>
