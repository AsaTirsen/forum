<?php
namespace Anax\View;

//Create urls for navigation
use Anax\TextFilter\TextFilter;
use function Anax\View\url;

$urlToAskQuestion = url("question/create");




$question = $data["question"];
$answers = $data["answers"];
$comments = $data["comments"];
$tags = $data["tags"];
$answerComments = $data["answerComments"];

$filter = new TextFilter();

?>

<?php if (!$question) : ?>
    <p>There are no questions to show.</p>
    <?php
    return;
endif;
?>

<h1><?= $filter->parse($question->title, ["shortcode", "markdown", "clickable", "bbcode"])->text ?>
</h1>
Tags:
<?php foreach ($tags as $tag) : ?>
    <?= $tag->name . ", " ?>
<?php endforeach; ?>
<?php if (empty($tags)) : ?>
(inga taggar)
<?php endif ?>

<p>
    <?= $filter->parse($question->question, ["shortcode", "markdown", "clickable", "bbcode"])->text ?>
</p>

<h4>Comments</h4>
<?php foreach ($comments as $comment) : ?>
    <p>
        <?= $filter->parse($comment->comment, ["shortcode", "markdown", "clickable", "bbcode"])->text ?>
    </p>
<?php endforeach; ?>
<p><a href="<?= url("comment/question/{$question->id}"); ?>">Comment on question</a></p>

<p><a href="<?= url("answer/create/{$question->id}"); ?>">Svara på frågan</a></p>

<?php foreach ($answers as $answer) : ?>
<h3>Answer</h3>
<p>
    <?= $filter->parse($answer->answer, ["shortcode", "markdown", "clickable", "bbcode"])->text ?>
</p>
<h4>Comments</h4>
<?php foreach ($answerComments as $comment) : ?>
    <?php if ($comment->answer_id == $answer->id) : ?>
        <p>
            <?= $filter->parse($comment->comment, ["shortcode", "markdown", "clickable", "bbcode"])->text ?>
        </p>
    <?php endif ?>
<?php endforeach; ?>
<p><a href="<?= url("comment/answer/{$answer->id}"); ?>">Comment on answer</a></p>

<?php endforeach; ?>


