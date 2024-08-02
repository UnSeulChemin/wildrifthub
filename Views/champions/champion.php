<section class="section-content">

    <section class="section-card-head flex-around-center m-b-40">

        <div>
            <h3><?= ucfirst($champion->name) ?></h3>
        </div>

        <div>
            <h3>Role</h3>
            <a class="link-role" href="<?= $pathRedirect; ?>champions/role/<?= $champion->role ?>"><?= ucfirst($champion->role) ?></a>
        </div>

        <div class="flex-center-center-gap-25">
            <h3>Difficulty</h3>   
            <img class="difficulty" src="<?= $championDifficulty ?>">
        </div>

    </section>

    <section class="section-card-image m-b-40">

        <figure class="figure-card-id">
            <img alt="<?= $champion->name ?>"
            src="<?= $pathRedirect; ?>public/images/champions/splashart/<?= $champion->splashart.".".$champion->extension ?>">
        </figure>

    </section>

    <section class="section-card-recommended flex-center-center-gap-25 m-b-30">

        <article class="flex">
            <p class="m-0">Core build</p>
            <p class="m-0">relation item... </p>
            <p class="m-0">luden</p>
            <p class="m-0">orbe</p>
        </article>

        <article class="flex">
            <p class="m-0">Rune</p>
            <p class="m-0">luden</p>
            <p class="m-0">orbe</p>
        </article>

        <article class="flex">
            <p class="m-0">Spell</p>
            <p class="m-0">luden</p>
            <p class="m-0">orbe</p>
        </article>

    </section>

    <section class="section-card-content m-b-40">

        <article>
            <h5>Basic tips for <span class="active"><?= ucfirst($champion->name) ?></span></h5>
            <p class="m-0"><?= nl2br($champion->free) ?></p>
        </article>

        <article>
            <h5>Pro tips for <span class="active"><?= ucfirst($champion->name) ?></span></h5>
            <?php if ($sessionPro): ?>
                <p class="m-0"><?= nl2br($champion->pro) ?></p>
            <?php else: ?>
                <p class="m-0">u need to be pro.. click here (grissé?)</p>
            <?php endif; ?>
        </article>

    </section>

    <div>
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>