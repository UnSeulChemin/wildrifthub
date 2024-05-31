<section class="section-content">

<?php echo $champion->name ?>

    <figure class="figure-card">
        <a role="link" class="flex" href="<?= $pathRedirect; ?>champions/name/<?= $champion->name ?>">
            <img class="" alt="<?= $champion->name?>" src="<?= $pathRedirect; ?>public/images/champions/<?= $champion->image.".".$champion->extension ?>">
        </a>
    </figure>

    <p>petit tips, ect. grizze avec ecrit pro</p>

    <div class="m-t-30">
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>