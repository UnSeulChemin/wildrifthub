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




    <section class="section-card-name">

            <figure class="figure-card-id">
                <img alt="<?= $champion->name ?>"
                    src="<?= $pathRedirect; ?>public/images/champions/<?= $champion->name.".".$champion->extension ?>">
            </figure>

    </section>


    <section class="section-card-name-content">

        <h5>Basic tips for <span class="active"><?= ucfirst($champion->name) ?></span></h5>
        <p><?php echo $champion->free ?></p>

        <h5>Pro tips for <span class="active"><?= ucfirst($champion->name) ?></span></h5>
        <p>u need to be pro.. click here (grissé?)</p>

    </section>

    <div class="m-t-30">
        <a class="link-back" href="javascript:history.go(-1)">Back</a>
    </div>

</section>