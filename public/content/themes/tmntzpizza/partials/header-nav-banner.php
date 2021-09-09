        <section class="under-header__nav">
            <h1>COMMANDEZ EN LIGNE</h1>
            <ul>
                <li class="header-thumbnail-container__livraison delivery_style">
                
                    <?php
                        if (wp_get_current_user()->id !== 0) : 
                    ?>
                    <a href="<?= home_url(); ?>/order/delivery/">
                    <?php else : ?>
                    <a href="<?= home_url(); ?>/order/delivery/">
                    <?php endif; ?>
                        <div class="header-thumbnail">
                            <h3 class="header-thumbnail__title">LIVRAISON</h3>
                            <img src="<?=get_theme_file_uri();?>/assets/images/delivery_icon.png" alt="" class="header-thumbnail__img icon_small">
                        </div>
                        <div class="header-thumbnail__icon"><img src="<?=get_theme_file_uri();?>/assets/images/arrow_icon.png" alt="" class="icon_small icon_arrow"></div>
                    </a>
                </li>
                <li class="header-thumbnail-container__emporter pickup_style">
                    <a href="<?= home_url();?>/order/pickup/">
                        <div class="header-thumbnail">
                            <h3 class="header-thumbnail__title">A EMPORTER</h3>
                            <img src="<?=get_theme_file_uri();?>/assets/images/pickup_icon.png" alt="" class="header-thumbnail__img icon_small">
                        </div>
                        <div class="header-thumbnail__icon"><img src="<?=get_theme_file_uri();?>/assets/images/arrow_icon.png" alt="" class="icon_small icon_arrow"></div>
                    </a>
                </li>
            </ul>
        </section>
