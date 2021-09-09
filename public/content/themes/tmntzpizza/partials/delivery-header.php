<?php
        $user = wp_get_current_user();
        get_edit_profile_url($user->id);
?>
        <section class="delivery-menu-container fixed">
            <nav class="delivery-menu">
                <a href="<?= home_url();?>"><img src="<?= get_theme_file_uri();?>/assets/images/tmnt_logo.png" alt="" id="header__logo"></a>
                <div class="delivery-menu-content">
                    <h2>COORDONNEES DE LIVRAISON</h2>
                    <?php 
                        if (wp_get_current_user()->id !== 0) : ?>
                            <div class="delivery-login-info">
                                <p>
                                    Welcome
                                    <a href="<?= get_edit_profile_url($user->id); ?>">
                                    <?= $user->display_name; ?> !
                                    </a>
                                </p>
                                <a href="<?= wp_logout_url(); ?>" id="header__login">
                                    DECONNEXION <i class="fas fa-user-circle"></i><i class="fas fa-user-circle"></i>
                                </a>
                            </div>
                    <?php
                        else : 
                    ?>
                    <ul>
                        <li><a href="<?= wp_login_url(); ?>">SE CONNECTER</a></li>
                        <li><a href="<?= wp_login_url(); ?>?action=register">CREER UN COMPTE</a></li>
                    </ul>
                    <?php endif; ?>
                </div>
            </nav>
        </section>
<?php
// var_dump(get_post_field( 'post_name', get_post() ));
?>