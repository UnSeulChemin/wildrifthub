<section class="section-content">

<?php if ($sessionUser): ?>

    <?php if ($sessionPro): ?>
        <p class="m-0">Already pro</p>
        <p class="m-0">See all hero tips here</p>
    <?php else: ?>
        <p class="m-0">Already loged.</p>
        <p class="m-0">Click here to become pro</p>
    <?php endif; ?>

<?php else: ?>

    <div class="m-b-30">
        <p class="m-0">If you don't have an account.</p>
        <p class="m-0 bold">Register an account here</p>
    </div>

    <div class="m-b-40">
        <a role="link" class="link-section" href="users/register">Register</a>
    </div>

    <div class="m-b-30">
        <p class="m-0">If u already have an account.</p>
        <p class="m-0 bold">Login here</p>
    </div>

    <div class="m-b-40">
        <a role="link" class="link-section" href="users/login">Login</a>
    </div>

    <div>
        <p class="m-0">First login.</p>
        <p class="m-0">Step 2.</p>
        <p class="m-0">Step 3.</p>
    </div>

<?php endif; ?>

</section>