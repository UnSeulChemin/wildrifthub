<?php 
$p = (str_contains($_GET["p"], "champions")) ? "active" : null;
$z = (str_contains($_GET["p"], "guides")) ? "active" : null;
?>

<header>
    <nav role="navigation" aria-label="Main navigation" class="flex-between-center">

        <div class="flex-center-center-gap-20">
            <img class="logo" src="<?= $pathRedirect; ?>public/images/favicon/favicon.png" alt="Logo">
            <h1>WildRift Hub</h1>
        </div>

        <ul role="list" class="flex">

            <li role="listitem" class="m-r-15"><a role="link" class="link-menu" href="<?= $pathRedirect; ?>./">Hub</a></li>

            <li role="listitem" class="m-r-15"><a role="link" class="<?= $p ?> link-menu" href="<?= $pathRedirect; ?>champions">Champions</a></li>
            <li role="listitem"><a role="link" class="<?= $z ?> link-menu" href="<?= $pathRedirect; ?>guides">Guides</a></li>
        </ul>

        <ul role="list" class="flex">
            <li role="listitem" class="m-r-15"><a role="link" class="link-menu" href="<?= $pathRedirect; ?>pro">Become Pro</a></li>
            <li role="listitem"><a role="link" class="link-menu" href="<?= $pathRedirect; ?>login">Login</a></li>
        </ul>
    </nav>
</header>