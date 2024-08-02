<section class="section-content">

    <h2>Users</h2>

    <?php foreach($users as $user): ?>
        <article class="article-content">
            <div>
                <p class="bold"><?= $user->email ?></p>
            </div>
            <div>
                <p><?= $user->roles ?></p>
            </div>
            <div>
                <a class="link-form" href="<?= $pathRedirect; ?>admin/updateUser/<?= $user->id ?>">Update</a>
            </div>
            <div>
                <a class="link-form" href="<?= $pathRedirect; ?>admin/deleteUser/<?= $user->id ?>">Delete</a>
            </div>
        </article>
    <?php endforeach; ?>

</section>