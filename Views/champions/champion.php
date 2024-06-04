<section class="section-content">

    <section class="section-card-name-head flex-around-center">

        <div>
            <h3><?= ucfirst($champion->name) ?></h3>
        </div>

        <div>
            <h3>Role</h3>
            <h4><?= ucfirst($champion->role) ?></h4>
        </div>

        <div>
            <h3>Difficulty</h3>   
            <h4>***</h4> 
        </div>

    </section>




    <section class="section-card-id">

            <figure class="figure-card-id">
                <img alt="<?= $champion->name ?>"
                    src="<?= $pathRedirect; ?>public/images/champions/<?= $champion->name.".".$champion->extension ?>">
            </figure>

            <div class="flex-center-center width-100">

                <h4>Basic tips</h4>
                <p><?php echo $champion->free ?></p>

                <h4>Pro tips</h4>
                <p>u need to be pro.. click here (grissé?)</p>

            </div>
    </section>

    <div class="m-t-30">
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>