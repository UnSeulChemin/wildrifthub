<section class="section-content">

<?php echo $champion->name ?>

    <figure class="figure-card">
        <a role="link" class="flex" href="<?= $pathRedirect; ?>champions/name/<?= $champion->name ?>">
            <img class="aa" alt="<?= $champion->name?>" src="<?= $pathRedirect; ?>public/images/champions/<?= $champion->image.".".$champion->extension ?>">
        </a>
    </figure>

    <p>Role : <?php echo $champion->role ?></p>

    <h4>Basic tips</h4>
    <p><?php echo $champion->free ?></p>

    <h4>Pro tips</h4>
    <p>u need to be pro.. click here (grissé?)</p>

    <div class="m-t-30">
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>