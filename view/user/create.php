<?php
namespace Anax\View;

// Create urls for navigation
use function Anax\View\url;

$urlToLogin = url("user/login");



?><h1>Skapa ny användare</h1>
<!--<img src="--><?php //isset($data["gravatar"]) ?? "no image"; ?><!--" alt="" />-->
<?= $data["form"] ?>

<p>
    <a href="<?= $urlToLogin ?>">Logga in</a>
</p>

