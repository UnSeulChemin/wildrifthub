<section class="section-content">

    <h2><?= ucfirst($guide->name) ?></h2>
   
    <section class="section-card-image m-b-40">

        <figure class="figure-card-id">
            <img alt="<?= $guide->name ?>"
            src="<?= $pathRedirect; ?>public/images/guides/thumbnail/<?= $guide->thumbnail.".".$guide->extension ?>">
        </figure>

    </section>

    <section class="section-card-recommended m-b-40">

        <article class="m-0"><?= $guide->content ?></article>

    </section>

    <div>
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>