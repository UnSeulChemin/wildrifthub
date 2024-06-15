<section class="section-content">

    <h2>Latest guides</h2>

    <div class="flex-center-center m-t-20">
        <?php foreach($guidesLatest as $image): ?>
            <div>
                <p><?= $image->name ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Latest champions</h2>

    <div class="flex-center-center m-t-20">
        <?php foreach($championsLatest as $image): ?>
            <div>
                <a class="link-card" href="champions/champion/<?= $image->name ?>"><?= ucfirst($image->name) ?></a>
            </div>
        <?php endforeach; ?>
    </div>

</section>