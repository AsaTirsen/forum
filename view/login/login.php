<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
//$items = isset($items) ? $items : null;
//
//// Create urls for navigation
//$urlToCreate = url("book/create");
//$urlToDelete = url("book/delete");
//
//

?><h1>You are successfully logged in</h1>
<img src="<?php isset($data["gravatar"]) ?? "no image"; ?>" alt="" />

<p>
    <a href="<?= $urlToCreate ?>">Create</a> |
    <a href="<?= $urlToDelete ?>">Delete</a>
</p>

