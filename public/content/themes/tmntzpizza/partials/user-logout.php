<?php
        $user = wp_get_current_user();
        get_edit_profile_url($user->id);
?>
<div>
    <p style="color: white;">
        Welcome
        <a href="<?= get_edit_profile_url($user->id); ?>">
        <?= $user->display_name; ?> !
        </a>
    </p>
    <a href="<?= wp_logout_url(); ?>" id="header__login">
        DECONNEXION <i class="fas fa-user-circle"></i><i class="fas fa-user-circle"></i>
    </a>
</div>