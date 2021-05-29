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


?><h1>Frågor</h1>


<?php if (!$questions) : ?>
    <p>Det finns inga frågor.</p>
    <?php
    return;
endif;
?>

<table>
    <?php foreach ($questions as $question) : ?>
    <tr>
        <th>Titel</th>
        <td>
            <a href="<?= url("question/read/{$question->id}"); ?>"><?= $question->title ?></a>
        </td>
    </tr>
    <tr>
        <th>Fråga</th>
        <td>
            <a href="<?= url("question/read/{$question->id}"); ?>"><?= $question->question ?></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

