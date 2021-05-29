<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question/create");



$question = $data["question"];
$question = isset($question) ? $question : null;
$answers = isset($answers) ? $answers : null;


?><h1>Question and answers</h1>


<?php if (!$question) : ?>
    <p>There are no questions to show.</p>
    <?php
    return;
endif;
?>

<table>
    <tr>
        <th>Titel</th>
        <td>
            <p><?= $question->title ?></p>
        </td>
    </tr>
    <tr>
        <th>Fråga</th>
        <td>
            <p><?= $question->question ?></p>
       <a href="<?= url("comment/question/{$question->id}"); ?>">Comment on question</a>

        </td>
    </tr>
    <tr>
        <?php foreach ($answers as $answer) : ?>
        <tr>
            <th>Svar</th>
            <td><?= $answer->answer?><a href="<?= url("comment/answer/{$answer->id}"); ?>">Comment on answer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <tr>

        <th>Svara på frågan</th>
        <td>
            <a href="<?= url("answer/create/{$question->id}"); ?>">Svara på frågan</a>
        </td>
    </tr>
</table>

