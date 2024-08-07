<header>
    <nav role="navigation" aria-label="Main navigation" class="flex-between-center">

        <div class="flex-center-center-gap-25">
            <img class="logo" src="<?= $pathRedirect; ?>public/images/favicon/favicon.png" alt="Logo">
            <h1>WildRift Hub</h1>
        </div>

        <ul role="list" class="flex-gap-20">
            <li role="listitem"><a role="link" class="<?= $activeHub ?>link-menu" href="<?= $pathRedirect; ?>./">Hub</a></li>
            <li role="listitem"><a role="link" class="<?= $activeChampions ?>link-menu" href="<?= $pathRedirect; ?>champions">Champions</a></li>
            <li role="listitem"><a role="link" class="<?= $activeGuides ?>link-menu" href="<?= $pathRedirect; ?>guides">Guides</a></li>
            <?php if ($sessionAdmin): ?>
                <li role="listitem"><a role="link" class="<?= $activeAdmin ?>link-menu" href="<?= $pathRedirect; ?>admin">Admin</a></li>
            <?php endif; ?>
        </ul>

        <ul role="list" class="flex-gap-20">
            <?php if ($sessionPro): ?>
                <li role="listitem"><a role="link" class="<?= $activePro ?>link-menu" href="<?= $pathRedirect; ?>users">Pro</a></li>
            <?php else: ?>
                <li role="listitem"><a role="link" class="<?= $activePro ?>link-menu" href="<?= $pathRedirect; ?>users">Become Pro</a></li>
            <?php endif; ?>
            <?php if ($sessionUser): ?>
                <li role="listitem"><a role="link" class="link-menu" href="<?= $pathRedirect; ?>users/logout">Logout</a></li>
            <?php else: ?>
                <li role="listitem"><a role="link" class="<?= $activeLogin ?>link-menu" href="<?= $pathRedirect; ?>users/login">Login</a></li>
            <?php endif; ?>
        </ul>

    </nav>
</header>