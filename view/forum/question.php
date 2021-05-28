<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question/create");


?><h1>Välkommen till frågorna</h1>
<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image";
?><!--" alt="" />-->


<p>
    <a href="<?= $urlToAskQuestion ?>">Ställ fråga</a>
</p>
<?php
?>


<!--Gather incoming variables and use default values if not set-->
<?php $questions = isset($questions) ? $questions : null;
$answers = isset($answers) ? $answers : null;


?><h1>Questions and answers</h1>


<?php if (!$questions) : ?>
    <p>There are no questions to show.</p>
    <?php
    return;
endif;
?>

<table>
    <?php foreach ($questions as $question) : ?>

    <tr>
        <th>Titel</th>
        <td>
            <a href="<?= url("question/update/{$question->id}"); ?>"><?= $question->title ?></a>
        </td>
    </tr>
    <tr>
        <th>Fråga</th>
        <td>
            <a href="<?= url("question/update/{$question->id}"); ?>"><?= $question->question ?></a>
        </td>
    <tr>
    <tr>
        <?php foreach ($answers as $answer) : ?>
        <tr>
            <th>Svar</th>
            <td><?= $answer->answer?></td>
        </tr>
        <?php endforeach; ?>
    </tr>
    <tr>

        <th>Svar på frågan</th>
        <td>
            <a href="<?= url("answer/create/{$question->id}"); ?>">Svara på frågan</a>
        </td>
    </tr>
    <?php endforeach;
    //    if ($answers = "") {
    //
    ?><!--<tr><td>Inget svar än</td></tr>-->
    <!--    --><?php //}
    //    else {
    //    foreach ($answers as $answer)
    ?>
    <!--    <tr>-->
    <!--        <td>--><? //=$answer->answer
    ?><!--</td>-->
    <!--    </tr>-->
    <!--    --><?php //endforeach;
    ?>
</table>
