<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;


?>
<article>
    <h1>Välkommen till taggarna</h1>
    <!--<img src="--><?php //isset($data["gravatar"]) ?? "no image";
    ?><!--" alt="" />-->


    <!--Gather incoming variables and use default values if not set-->
    <?php $tags = isset($tags) ? $tags : null;
    $selectedTagId = $data["selectedTagId"];
    $questionsArray = $data["questionsArray"];

    if (!$tags) : ?>
        <p>There are no tags to show.</p>
        <?php
        return;
    endif;
    ?>

    <table>
        <tr>
            <th>Tags</th>
        </tr>
        <?php foreach ($tags as $tag) : ?>
            <tr>
                <td>
                    <a href="<?= url("tag?tag_id={$tag->id}"); ?>"><?= $tag->name ?></a>
                </td>
            </tr>
            <?php if ($selectedTagId != null && $selectedTagId == $tag->id) : ?>
                <tr>
                    <?php if (!$questionsArray) : ?>
                        <p>There are no questions for this tag.</p>
                    <?php
                    endif;
                    foreach ($questionsArray as $question) : ?>
                        <td>
                            <a href="<?= url("question?question_id={$question->id}"); ?>"><?= $question->question ?></a>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</article>
