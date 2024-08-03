<section class="section-content">

    <h2>Profile</h2>
   
    <div class="m-b-40">
        <p class="m-b-20"><?= $user->email ?></p>
        <a role="link" class="link-profile" href="updateEmail">Update</a>
    </div>

    <div>
        <p class="m-0">Compte crée le</p>
        <p class="m-0"><?= date('d/m/Y', strtotime($user->created_at)); ?></p>
    </div>

</section>