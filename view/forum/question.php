<?php
namespace Anax\View;

//Create urls for navigation
use Anax\TextFilter\TextFilter;
use function Anax\View\url;

$urlToAskQuestion = url("question/create");


?>
<article>
    <h1>Välkommen till frågorna</h1>
<p class="centered">
  <a href="<?= $urlToAskQuestion ?>">Ställ fråga</a>
</p>
<?php
?>


<!--Gather incoming variables and use default values if not set-->
<?php $questions = isset($questions) ? $questions : null;
$answers = isset($answers) ? $answers : null;
$filter = new TextFilter();

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
        <th><h3>Titel</h3></th>
        <td>
                <a href="<?= url("question/read/{$question->id}"); ?>"><?=  $filter->parse($question->title, ["shortcode", "markdown", "clickable", "bbcode"])->text ?></a>
        </td>
    </tr>
    <tr>
        <th><h3>Fråga</h3></th>
        <td>
            <a href="<?= url("question/read/{$question->id}"); ?>"><?= $filter->parse($question->question, ["shortcode", "markdown", "clickable", "bbcode"])->text ?></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</article>
