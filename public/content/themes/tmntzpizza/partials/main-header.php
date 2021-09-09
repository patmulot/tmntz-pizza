    <header class="fixed">
        <nav class="section main-menu">
            <a href="<?= home_url();?>"><img src="<?= get_theme_file_uri();?>/assets/images/tmnt_logo.png" alt="" id="header__logo"></a>
            <ul>
                <li><a href="<?= home_url(); ?>/card/">LA CARTE</a></li>
                <li><a href="<?= home_url(); ?>/shop/card/type/6">link#</a></li>
                <li><a href="<?= home_url(); ?>/shop/card/type/6">link#</a></li>
                <li><a href="<?= home_url(); ?>/shop/card/type/6">link#</a></li>
                <li><a href="<?= home_url(); ?>/shop/card/type/6">link#</a></li>
            </ul>
            <?php 
            // wp_get_current_user();
            if (wp_get_current_user()->id !== 0) {
                get_template_part('partials/user-logout');
            } else {
                get_template_part('partials/user-login');
            }; ?>
        </nav>
<?php
// var_dump(get_post_field( 'post_name', get_post() ));
?>
    </header>