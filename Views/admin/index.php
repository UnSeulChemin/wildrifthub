<section class="section-content">

    <h2>Admin</h2>

    <nav role="navigation" aria-label="Admin navigation" class="m-b-40">

        <ul role="list" class="flex-center-center-gap-50">
            <li role="listitem"><a role="link" class="link-section" href="admin/users">Users</a></li>
        </ul>

    </nav>

    <?= $contactForm; ?>

    <?php foreach($todos as $image): ?>
        <p class="m-0"><?= $image->content ?></p>
    <?php endforeach; ?>

</section>