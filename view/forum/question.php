<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question/create");



?><h1>Välkommen till frågorna</h1>
<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image"; ?><!--" alt="" />-->



<p>
    <a href="<?= $urlToAskQuestion ?>">Ställ fråga</a>
</p>
<?php
?>


<!--Gather incoming variables and use default values if not set-->
<?php $items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1>View all items</h1>


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
        <th>Svar</th>



    </tr>
    <?php foreach ($items as $item) : ?>
        <tr>
            <td>
                <a href="<?= url("question/update/{$item->id}"); ?>"><?= $item->title ?></a>
            </td>
            <td>
                <a href="<?= url("question/update/{$item->id}"); ?>"><?= $item->question ?></a>
            </td>
            <td>
                <a href="<?= url("answer?{$item->id}"); ?>">Svara på frågan</a>
            </td>

        </tr>
    <?php endforeach;
//    if ($answers = "") {
//         ?><!--<tr><td>Inget svar än</td></tr>-->
<!--    --><?php //}
//    else {
//    foreach ($answers as $answer)?>
<!--    <tr>-->
<!--        <td>--><?//=$answer->answer?><!--</td>-->
<!--    </tr>-->
<!--    --><?php //endforeach; ?>
</table>
