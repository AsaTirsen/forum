<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question");



?><h1>Välkommen till forumet</h1>

<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image"; ?><!--" alt="" />-->

<p>Senaste frågorna</p>

<p>Mest aktiva användare</p>

<p>Populäraste taggarna</p>

<!--Gather incoming variables and use default values if not set-->
    <?php $items = isset($items) ? $items : null;

    // Create urls for navigation
    $urlToCreate = url("book/create");
    $urlToDelete = url("book/delete");



    ?><h1>View all items</h1>

    <p>
        <a href="<?= $urlToCreate ?>">Create</a> |
        <a href="<?= $urlToDelete ?>">Delete</a>
    </p>

    <?php if (!$items) : ?>
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
    <?php foreach ($items as $item) : ?>
        <tr>
            <td>
                <a href="<?= url("question/{$item->id}"); ?>"><?= $item->title ?></a>
            </td>
            <td>
                <a href="<?= url("question/{$item->id}"); ?>"><?= $item->question ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

