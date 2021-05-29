<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question");

$user = $data["user"];
$mostActiveUsers = $data["mostActiveUsers"];
$mostPopularTags = $data["mostPopularTags"];
?><h1>Välkommen till forumet <img src="<?= $user->getGravatar() ?>" alt="" /> <?=$user->acronym?></h1>

<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image"; ?><!--" alt="" />-->

<p>Senaste frågorna</p>

<p>Mest aktiva användare</p>

<?php if (empty($mostActiveUsers)) : ?>
Ingen användare har någon aktivitet
<?php endif ?>

<?php foreach ($mostActiveUsers as $user) : ?>
    <a href="<?= url("question?user_id={$user->id}"); ?>">
    <img src="<?= $user->getGravatar() ?>" alt="" />
    <?=$user->acronym?>
    </a>
<?php endforeach ?>

<p>Populäraste taggarna</p>

<?php if (empty($mostPopularTags)) : ?>
    Ingen användare har någon aktivitet
<?php endif ?>

<?php foreach ($mostPopularTags as $tag) : ?>
    <a href="<?= url("tag?tag_id={$tag->id}"); ?>"><?= $tag->name ?></a>
<?php endforeach ?>


<!--Gather incoming variables and use default values if not set-->
    <?php $questions = isset($data["questions"]) ? $data["questions"]: null;



    ?><h1>View </h1>

    <p>
        <a href="<?= $urlToCreate ?>">Create</a> |
        <a href="<?= $urlToDelete ?>">Delete</a>
    </p>

    <?php if (!$questions) : ?>
    <p>There are no items to show.</p>
    <?php
    return;
endif;
?>

<table>
    <tr>
        <th>Titel</th>
        <th>Fråga</th>
    </tr>
    <?php foreach ($questions as $item) : ?>
        <tr>
            <td>
                <a href="<?= url("question/read/{$item->id}"); ?>"><?= $item->title ?></a>
            </td>
            <td>
                <a href="<?= url("question/read/{$item->id}"); ?>"><?= $item->question ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

