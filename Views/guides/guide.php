<section class="section-content">

    <h4><?= $guide->name ?></h4>
   
    <section class="section-card-image m-t-50">

        <figure class="figure-card-id">
            <img alt="<?= $guide->name ?>"
            src="<?= $pathRedirect; ?>public/images/guides/thumbnail/<?= $guide->thumbnail.".".$guide->extension ?>">
        </figure>

        <p><?= $guide->content ?></p>

    </section>

    <div class="m-t-30">
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>