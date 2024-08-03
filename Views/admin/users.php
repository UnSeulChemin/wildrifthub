<section class="section-content">

    <h2>Users</h2>

    <?php foreach($users as $user): ?>

        <article class="article-content">

            <div class="m-b-30">
                <p class="m-0"><?= $user->email ?></p>
                <p class="m-0"><?= $user->roles ?></p>
            </div>

            <div class="flex-center-center-gap-50">
                <a class="link-section" href="<?= $pathRedirect; ?>admin/updateUser/<?= $user->id ?>">Update</a>
                <a class="link-section" href="<?= $pathRedirect; ?>admin/deleteUser/<?= $user->id ?>">Delete</a>
            </div>

        </article>

    <?php endforeach; ?>

</section>