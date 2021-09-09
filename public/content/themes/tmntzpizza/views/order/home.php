<?php
get_header();
// $foodThumbnailsTab = $args["foodThumbnailsTab"];
?>
<?php get_template_part('partials/delivery-header'); ?>
<section class="delivery-menu-container"></section>
<main>
    <section class="under-header__nav order_home">
        <h2 class="order_home_subtitle">DERNIERES ADRESSES UTILISEES</h2>
        <div class="order_home-container">
            <div class="order_home-content header-thumbnail-container__livraison delivery_style">
                <a href="<?= home_url();?>/order/delivery/">
                    <div class="order_home-content__text">
                        <p class="order_home-title">LIVRAISON AU</p>
                        <p>blablablablabla</p>
                    </div>
                    <div class="icon_arrow_container">
                        <img src="<?=get_theme_file_uri();?>/assets/images/arrow_icon.png" alt="" class="icon_small icon_arrow">
                    </div>
                </a>
            </div>
            <div class="order_home-content header-thumbnail-container__emporter pickup_style">
                <a href="<?= home_url();?>/order/pickup/">
                    <div class="order_home-content__text">
                        <p class="order_home-title">A RETIRER A</h3>
                        <p>blablablablabla</p>
                    </div>
                    <div class="icon_arrow_container">
                        <img src="<?=get_theme_file_uri();?>/assets/images/arrow_icon.png" alt="" class="icon_small icon_arrow">
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <section class="under-header__nav">
        <h2 class="order_home_subtitle">COMMANDEZ EN LIGNE</h2>
        <div class="order_home-container">
            <div class="order_home-oneline-content header-thumbnail-container__livraison delivery_style">
            
                <?php // $isUserLogged = is_user_logged_in();
                // if ($isUserLogged === true) :?>
                <a href="<?= home_url();?>/order/delivery/">
                <?php // else :?>
                <!-- <a href="<?= "" // wp_login_url();?>"> -->
                <?php // endif;?>
                    <div class="order_home-online">
                        <div class="order_home-title">
                            <img src="<?=get_theme_file_uri();?>/assets/images/delivery_icon.png" alt="" class="order_home-delivery-icon icon_small">
                        </div>
                        <h3 class="order_home-online-title">LIVRAISON</h3>
                        <p>
                            Faites-vous livrer votre commande à domicile
                        </p>
                    </div>
                </a>
            </div>
            <div class="order_home-oneline-content header-thumbnail-container__emporter pickup_style">
                <a href="<?= home_url();?>/order/pickup/">
                    <div class="order_home-online">
                        <div class="order_home-title">
                            <img src="<?=get_theme_file_uri();?>/assets/images/pickup_icon.png" alt="" class="order_home-delivery-icon icon_small">
                        </div>
                        <h3 class="order_home-online-title">A EMPORTER</h3>
                        <p>
                            Retirer votre commande dans votre TMNTz
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="order_express_container-section">
        <a href="<?= home_url();?>/shop/card/type/6/" class="order_express_container">
            <div class="order_express_container-icon">
                <img src="<?=get_theme_file_uri();?>/assets/images/clock_icon.png" alt="" class="icon_small">
            </div>
            <div class="order_express_container-text">
                <h3 class="order_home-online-title">COMMANDE EXPRESS</h3>
                <p>
                    Repassez une de vos commandes préférées
                </p>
            </div>
        </a>
    </section>
    <section class="order_express_container-section">
        <div class="order_home-connect">
            <?php if ($isUserLogged === true) : ?>
            <?php else : ?>
            <ul>
                <li><a href="<?= wp_login_url(); ?>">SE CONNECTER</a></li>
                <li id="slash_link">/</li>
                <li><a href="<?= wp_login_url(); ?>?action=register">CREER UN COMPTE</a></li>
            </ul>
            <?php endif; ?>
        </div>
    </section>


</main>
    <?php get_footer();?>