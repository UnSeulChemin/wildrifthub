<section class="section-content">

    <?php if ($sessionPro): ?>

    <p>Alraedy pro</p>
    <p>See all hero tips</p>

    <?php else: ?>

    <div class="flex-center-center">
        <p class="m-0">Register an account first here</p>
    </div>

    <div class="m-t-20">
        <a role="link" class="link-section" href="users/register">Register</a>
    </div>

    <div class="flex-center-center m-t-20">
        <p class="m-0">if u already have an account login here</p>
    </div>

    <div class="m-t-20">
        <a role="link" class="link-section" href="users/login">Login</a>
    </div>

    <?php endif; ?>

</section>