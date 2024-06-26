<section class="section-content">

    <section class="section-card-head flex-around-center">

        <div>
            <h3><?= ucfirst($champion->name) ?></h3>
        </div>

        <div>
            <h3>Role</h3>
            <a href="<?= $pathRedirect; ?>champions/role/<?= $champion->role ?>"><?= ucfirst($champion->role) ?></a>
        </div>

        <div class="flex-center-center-gap-20">
            <h3>Difficulty</h3>   
            <img class="difficulty" src="<?= $championDifficulty ?>">
        </div>

    </section>

    <section class="section-card-image m-t-50">

        <figure class="figure-card-id">
            <img alt="<?= $champion->name ?>"
            src="<?= $pathRedirect; ?>public/images/champions/splashart/<?= $champion->splashart.".".$champion->extension ?>">
        </figure>

    </section>

    <section class="section-card-recommended flex-around-center m-t-50">

            <article class="flex-gap-50">

                <div class="flex">
                    <p>Core build</p>
                    <p>relation item... </p>
                    <p>luden</p>
                    <p>orbe</p>
                </div>

                <div class="flex">
                    <p>Rune</p>
                    <p>luden</p>
                    <p>orbe</p>
                </div>

                <div class="flex">
                    <p>Spell</p>
                    <p>luden</p>
                    <p>orbe</p>
                </div>

            </article>

    </section>

    <section class="section-card-content m-t-50">

        <article>
            <h5>Basic tips for <span class="active"><?= ucfirst($champion->name) ?></span></h5>
            <p><?= nl2br($champion->free) ?></p>
        </article>

        <article>
            <h5>Pro tips for <span class="active"><?= ucfirst($champion->name) ?></span></h5>
            <?php if ($sessionPro): ?>
                <p><?= nl2br($champion->pro) ?></p>
            <?php else: ?>
                <p>u need to be pro.. click here (grissé?)</p>
            <?php endif; ?>
        </article>

    </section>

    <div class="m-t-30">
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>